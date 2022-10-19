<?php
/**
 * Constant Contact integration handler
 *
 * @package WishListMember/Autoresponders
 */

namespace WishListMember\Autoresponders;

if ( ! class_exists( 'ConstantContact\API_V3' ) ) {
	require_once __DIR__ . '/wlm-constantcontact-v3.php';
}

/**
 * Constant Contact integration handler file.
 */
class ConstantContact {

	/**
	 * Called by wishlistmember_user_registered hook
	 *
	 * @param  string $user_id User ID.
	 * @param  array  $data    Registration data.
	 */
	public static function user_registered( $user_id, $data ) {
		self::added_to_level( $user_id, array( $data['wpm_id'] ) );
	}

	/**
	 * Called by wishlistmember_add_user_levels_shutdown hook
	 * Called by wishlistmember_confirm_user_levels hook
	 * Called by wishlistmember_approve_user_levels hook
	 *
	 * @param  integer $user_id User ID.
	 * @param  array   $levels  Level IDs.
	 */
	public static function added_to_level( $user_id, $levels ) {
		$levels = wlm_remove_inactive_levels( $user_id, $levels );
		self::pre_process( $user_id, $levels, 'added' );
	}

	/**
	 * Called by wishlistmember_remove_user_levels hook
	 *
	 * @param  integer $user_id User ID.
	 * @param  array   $levels  Level IDs.
	 */
	public static function removed_from_level( $user_id, $levels ) {
		self::pre_process( $user_id, $levels, 'removed' );
	}

	/**
	 * Called by wishlistmember_uncancel_user_levels hook
	 *
	 * @param  integer $user_id User ID.
	 * @param  array   $levels  Level IDs.
	 */
	public static function uncancelled_from_level( $user_id, $levels ) {
		self::pre_process( $user_id, $levels, 'uncancelled' );
	}

	/**
	 * Called by wishlistmember_cancel_user_levels hook
	 *
	 * @param  integer $user_id User ID.
	 * @param  array   $levels  Level IDs.
	 */
	public static function cancelled_from_level( $user_id, $levels ) {
		self::pre_process( $user_id, $levels, 'cancelled' );
	}

	/**
	 * Pre-processes a request.
	 *
	 * @param  string|integer $email_or_id  Email or User ID.
	 * @param  array          $levels       Level IDs.
	 * @param  string         $action       Action to perform.
	 */
	public static function pre_process( $email_or_id, $levels, $action ) {

		// get email address.
		if ( is_numeric( $email_or_id ) ) {
			$userdata = get_userdata( $email_or_id );
		} elseif ( filter_var( $email_or_id, FILTER_VALIDATE_EMAIL ) ) {
			$userdata = get_user_by( 'email', $email_or_id );
		} else {
			return; // email_or_id is neither a valid ID or email address.
		}
		if ( ! $userdata ) {
			return;
		}

		// make sure email is not temp.
		if ( ! wlm_trim( $userdata->user_email ) || preg_match( '/^temp_[0-9a-f]+/i', $userdata->user_email ) ) {
			return;
		}

		// make sure levels is an array.
		if ( ! is_array( $levels ) ) {
			$levels = array( $levels );
		}

		self::process( $userdata, $levels, $action );
	}

	/**
	 * Processes a request.
	 *
	 * @param  object $userdata User data.
	 * @param  array  $levels   Level IDs.
	 * @param  string $action   Action to perform.
	 */
	public static function process( $userdata, $levels, $action ) {
		static $ar;
		$contact_record  = array();
		$contact_lists   = array();
		$contact_tags    = array();
		$tags_to_remove  = array();
		$tags_to_add     = array();
		$lists_to_remove = array();
		$lists_to_add    = array();

		if ( ! $ar ) { // retrieve AR settings.
			$ar = ( new \WishListMember\Autoresponder( 'constantcontact' ) )->settings;
		}

		// initialize API class.
		$constant_contact_v3 = new ConstantContact\API_V3( admin_url() );

		$access_token = get_transient( 'wlm_constantcontact_token' );
		if ( ! $access_token ) { // our token expired.
			$constant_contact_v3->refresh_token(); // lets get a new one.
			$access_token = get_transient( 'wlm_constantcontact_token' );
			usleep( 250000 ); // lets delay for a bit.
		}
		if ( ! $access_token ) {
			return; // not setup.
		}

		// get contact's record if available.
		$res = $constant_contact_v3->get(
			$access_token,
			'contacts',
			array(
				'email'   => $userdata->user_email,
				'status'  => 'all',
				'include' => 'list_memberships,taggings',
			)
		);
		if ( $constant_contact_v3->is_success() ) {
			usleep( 250000 ); // lets delay for a bit.
			if ( count( $res['contacts'] ) ) {
				$contact_record = $res['contacts'][0];
				if ( ! isset( $contact_record['contact_id'] ) ) {
					$contact_record = array();
				} else {
					$contact_lists = $contact_record['list_memberships'];
					$contact_tags  = $contact_record['taggings'];
				}
			}
		}

		// lets get the settings.
		foreach ( $levels as $level_id ) {
			$add = wlm_or( $ar['list_actions'][ $level_id ][ $action ]['add'], array() );
			$add = ! empty( $add ) ? $add : array();
			$add = is_array( $add ) ? $add : array( $add );

			$remove = wlm_or( $ar['list_actions'][ $level_id ][ $action ]['remove'], array() );
			$remove = ! empty( $remove ) ? $remove : array();
			$remove = is_array( $remove ) ? $remove : array( $remove );

			$add_tag = wlm_or( $ar['tag_actions'][ $level_id ][ $action ]['add'], array() );
			$add_tag = ! empty( $add_tag ) ? $add_tag : array();
			$add_tag = is_array( $add_tag ) ? $add_tag : array( $add_tag );

			$remove_tag = wlm_or( $ar['tag_actions'][ $level_id ][ $action ]['remove'], array() );
			$remove_tag = ! empty( $remove_tag ) ? $remove_tag : array();
			$remove_tag = is_array( $remove_tag ) ? $remove_tag : array( $remove_tag );

			if ( count( $remove ) > 0 ) {
				$remove          = array_intersect( $contact_lists, $remove );
				$lists_to_remove = array_unique( array_merge( $lists_to_remove, $remove ) );
			}
			if ( count( $add ) > 0 ) {
				$add          = array_diff( $add, $contact_lists );
				$lists_to_add = array_unique( array_merge( $lists_to_add, $add ) );
			}

			if ( count( $remove_tag ) > 0 ) {
				$remove_tag     = array_intersect( $contact_tags, $remove_tag );
				$tags_to_remove = array_unique( array_merge( $tags_to_remove, $remove_tag ) );
			}
			if ( count( $add_tag ) > 0 ) {
				$add_tag     = array_diff( $add_tag, $contact_tags );
				$tags_to_add = array_unique( array_merge( $tags_to_add, $add_tag ) );
			}
		}

		// make sure no empty value on our array.
		$tags_to_remove = array_filter(
			$tags_to_remove,
			function( $value ) {
				return ! is_null( $value ) && '' !== $value;
			}
		);
		$tags_to_add    = array_filter(
			$tags_to_add,
			function( $value ) {
				return ! is_null( $value ) && '' !== $value;
			}
		);

		$lists_to_remove = array_filter(
			$lists_to_remove,
			function( $value ) {
				return ! is_null( $value ) && '' !== $value;
			}
		);
		$lists_to_add    = array_filter(
			$lists_to_add,
			function( $value ) {
				return ! is_null( $value ) && '' !== $value;
			}
		);

		// if no contact id, therefore new user.
		if ( ! isset( $contact_record['contact_id'] ) ) {
			$contact_record['email_address']    = $userdata->user_email;
			$contact_record['first_name']       = $userdata->first_name;
			$contact_record['last_name']        = $userdata->last_name;
			$contact_record['list_memberships'] = $lists_to_add;
			// create a new contact.
			$res = $constant_contact_v3->post( $access_token, 'contacts/sign_up_form', $contact_record );
			if ( $constant_contact_v3->is_success() ) {
				if ( isset( $res['contact_id'] ) ) {
					$contact_record['contact_id'] = $res['contact_id'];
				}
				usleep( 250000 ); // lets delay for a bit.
			} else {
					$last_error = $constant_contact_v3->get_last_error();
				if ( $last_error ) {
					trigger_error( wp_kses( $last_error ) );
				}
			}
		}

		// if we have a contact id, then its on to proceed.
		if ( isset( $contact_record['contact_id'] ) ) {

			// for removing list from contact.
			if ( count( $lists_to_remove ) ) {
				$args = array(
					'source'   => array(
						'contact_ids' => array( $contact_record['contact_id'] ),
					),
					'list_ids' => $lists_to_remove,
				);
				$constant_contact_v3->post( $access_token, 'activities/remove_list_memberships', $args );
				if ( $constant_contact_v3->is_success() ) {
					usleep( 250000 ); // lets delay for a bit.
				} else {
					$last_error = $constant_contact_v3->get_last_error();
					if ( $last_error ) {
						trigger_error( wp_kses( $last_error ) );
					}
				}
			}

			// for adding list to contact.
			if ( count( $lists_to_add ) ) {
				$args = array(
					'source'   => array(
						'contact_ids' => array( $contact_record['contact_id'] ),
					),
					'list_ids' => $lists_to_add,
				);
				$constant_contact_v3->post( $access_token, 'activities/add_list_memberships', $args );
				if ( $constant_contact_v3->is_success() ) {
					usleep( 250000 ); // lets delay for a bit.
				} else {
					$last_error = $constant_contact_v3->get_last_error();
					if ( $last_error ) {
						trigger_error( wp_kses( $last_error ) );
					}
				}
			}

			// for removing tags from contact.
			if ( count( $tags_to_remove ) ) {
				$args = array(
					'source'  => array(
						'contact_ids' => array( $contact_record['contact_id'] ),
					),
					'tag_ids' => $tags_to_remove,
				);
				$constant_contact_v3->post( $access_token, 'activities/contacts_taggings_remove', $args );
				if ( $constant_contact_v3->is_success() ) {
					usleep( 250000 ); // lets delay for a bit.
				} else {
					$last_error = $constant_contact_v3->get_last_error();
					if ( $last_error ) {
						trigger_error( wp_kses( $last_error ) );
					}
				}
			}

			// for tagging a contact.
			if ( count( $tags_to_add ) ) {
				$args = array(
					'source'  => array(
						'contact_ids' => array( $contact_record['contact_id'] ),
					),
					'tag_ids' => $tags_to_add,
				);
				$constant_contact_v3->post( $access_token, 'activities/contacts_taggings_add', $args );
				if ( $constant_contact_v3->is_success() ) {
					usleep( 250000 ); // lets delay for a bit.
				} else {
					$last_error = $constant_contact_v3->get_last_error();
					if ( $last_error ) {
						trigger_error( wp_kses( $last_error ) );
					}
				}
			}
		}

	}
}
