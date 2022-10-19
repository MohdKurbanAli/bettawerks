<?php
/**
 * Box_Basic Blocks
 *
 * @package WishListMember\Features
 */

namespace WishListMember\Features\Box_Basic;

/**
 * Blocks class
 */
class Blocks {
	/**
	 * Construct
	 */
	public function __construct() {
		add_filter( 'block_categories_all', array( $this, 'blocks_categories' ), 10, 2 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'blocks_enqueue_assets' ), 9 );
		add_action( 'init', array( $this, 'blocks_register' ), 9 );
	}
	/**
	 * Blocks_categories function
	 *
	 * @param Category $categories
	 * @param POST     $post
	 * @return mixed
	 */
	public function blocks_categories( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'wishlist-box-basic-blocks-category',
					'title' => __( 'WishList Member', 'wishlist-box-basic' ),
				),
			)
		);
	}

	/**
	 * Blocks enqueue assets
	 *
	 * @return void
	 */
	public function blocks_enqueue_assets() {
		wp_enqueue_script(
			'wishlist-box-basic-blocks-editor-js',
			WISHLISTMEMBER_BOX_BASIC_URL . 'dist/editor_script.js',
			array(
				'wp-edit-post',
				'wp-html-entities',
				'wp-compose',
				// 'wp-base-styles',
				'wp-block-editor',
				'wp-server-side-render',
				'wp-blocks',
				'wp-components',
				'wp-core-data',
				'wp-data',
				'wp-dom-ready',
				'wp-editor',
				'wp-element',
				'wp-format-library',
				'wp-i18n',
				'wp-media-utils',
			),
			filemtime( WISHLISTMEMBER_BOX_BASIC_DIR . 'dist/editor_script.js' ),
			$in_footer = false
		);

		wp_add_inline_script(
			'wishlist-box-basic-blocks-editor-js',
			'window.wishlistmember_mergecodes_simple = ' . wp_json_encode( $this->mergecodes_simple() ) . ';'
		);
		wp_add_inline_script(
			'wishlist-box-basic-blocks-editor-js',
			'window.wishlistmember_wpm_levels = ' . wp_json_encode( $this->wpm_levels() ) . ';'
		);

	}

	/**
	 * Mergecodes_simple function
	 *
	 * @return array
	 */
	public function mergecodes_simple() {

		$manifest          = wishlistmember_instance()->wlmshortcode->manifest;
		$mergecodes_simple = array();

		foreach ( $manifest['Mergecodes'] as $mergecodes_mix1 ) {
			foreach ( $mergecodes_mix1 as $key => $mergecodes_mix2 ) {
				$mergecodes_simple[ $key ] = $mergecodes_mix2;
			}
		}

		unset( $mergecodes_simple['wlm_address'] );
		unset( $mergecodes_simple['wlm_aim'] );
		unset( $mergecodes_simple['wlm_yim'] );
		unset( $mergecodes_simple['wlm_jabber'] );
		unset( $mergecodes_simple['wlm_memberlevel'] );
		unset( $mergecodes_simple['wlm_userpayperpost'] );
		unset( $mergecodes_simple['wlm_contentlevels'] );

		unset( $mergecodes_simple['wlm_loginform'] );
		unset( $mergecodes_simple['wlm_profileform'] );
		unset( $mergecodes_simple['wlm_profilephoto'] );

		return $mergecodes_simple;
	}

	/**
	 * Get Wpm levels
	 *
	 * @return array
	 */
	public function wpm_levels() {
		$wpm_levels  = (array) wishlistmember_instance()->get_option( 'wpm_levels' );
		$wpm_levels2 = array();
		foreach ( $wpm_levels as $key => $wpm_level ) {
			$wpm_levels2[ $key ] = array( 'name' => $wpm_levels[ $key ]['name'] );
		}
		return $wpm_levels2;
	}

	/**
	 * Blocks_register_block_type
	 *
	 * @param Block $block    WordPress Block.
	 * @param array $options  Options.
	 * @return void
	 */
	public function blocks_register_block_type( $block, $options = array() ) {
		register_block_type(
			'wishlist-box-basic-blocks/' . $block,
			array_merge(
				array(
					'editor_script' => 'wishlist-box-basic-blocks-editor-script',
					'editor_style'  => 'wishlist-box-basic-blocks-editor-style',
					'script'        => 'wishlist-box-basic-blocks-script',
					'style'         => 'wishlist-box-basic-blocks-style',
				),
				$options
			)
		);
	}

	/**
	 * Blocks_register
	 *
	 * @return void
	 */
	public function blocks_register() {

		wp_register_script(
			'wishlist-box-basic-blocks-editor-script',
			WISHLISTMEMBER_BOX_BASIC_URL . 'dist/editor.js',
			array(
				'wp-html-entities',
				'wp-compose',
				// 'wp-base-styles',
				'wp-block-editor',
				'wp-server-side-render',
				'wp-blocks',
				'wp-components',
				'wp-core-data',
				'wp-data',
				'wp-dom-ready',
				'wp-editor',
				'wp-element',
				'wp-format-library',
				'wp-i18n',
				'wp-media-utils',
			),
			WISHLISTMEMBER_BOX_BASIC_VERSION,
			$in_footer = false
		);

		wp_register_script(
			'wishlist-box-basic-blocks-script',
			WISHLISTMEMBER_BOX_BASIC_URL . 'dist/script.js',
			array( 'jquery' ),
			WISHLISTMEMBER_BOX_BASIC_VERSION,
			$in_footer = false
		);

		wp_register_style(
			'wishlist-box-basic-blocks-editor-style',
			WISHLISTMEMBER_BOX_BASIC_URL . 'dist/editor.css',
			array( 'wp-edit-blocks' ),
			WISHLISTMEMBER_BOX_BASIC_VERSION,
			$in_footer = false
		);

		wp_register_style(
			'wishlist-box-basic-blocks-style',
			WISHLISTMEMBER_BOX_BASIC_URL . 'dist/style.css',
			WISHLISTMEMBER_BOX_BASIC_VERSION,
			$in_footer = false
		);

		$this->blocks_register_block_type(
			'access-userpayperpost',
			array(
				'render_callback' => array( $this, 'render_block_access_userpayperpost' ),
				'attributes'      => array(
					'content'       => array(
						'type'    => 'string',
						'default' => '',
					),
					'sort'          => array(
						'type'    => 'string',
						'default' => 'ascending',
					),
					'sortby'        => array(
						'type'    => 'string',
						'default' => 'date-assigned',
					),
					'liststyletype' => array(
						'type'    => 'string',
						'default' => 'none',
					),
					'total'         => array(
						'type'    => 'int',
						'default' => 5,
					),
					'showmoretext'  => array(
						'type'    => 'string',
						'default' => 'Show More...',
					),
					'ineditor'      => array(
						'type'    => 'boolean',
						'default' => false,
					),
					'buttonstyle'   => array(
						'type'    => 'string',
						'default' => 'button',
					),
					'totalshowmore' => array(
						'type'    => 'int',
						'default' => 3,
					),
				),
			)
		);

		$this->blocks_register_block_type(
			'profileform',
			array(
				'render_callback' => array( $this, 'render_block_profileform' ),
				'attributes'      => array(
					'content'          => array(
						'type'    => 'string',
						'default' => '',
					),
					'listsubscription' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'profile_photo'    => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'first_name'       => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'last_name'        => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'nickname'         => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'display_name'     => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'email'            => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'user_password'    => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'company'          => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'address1'         => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'address2'         => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'city'             => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'state'            => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'zip'              => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'country'          => array(
						'type'    => 'boolean',
						'default' => true,
					),
				),
			)
		);

		$this->blocks_register_block_type(
			'access-memberlevels',
			array(
				'render_callback' => array( $this, 'render_block_access_memberlevels' ),
				'attributes'      => array(
					'content' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			)
		);

		$this->blocks_register_block_type(
			'profilephoto',
			array(
				'render_callback' => array( $this, 'render_block_profilephoto' ),
				'attributes'      => array(
					'content'      => array(
						'type'    => 'string',
						'default' => '',
					),
					'returnformat' => array(
						'type'    => 'string',
						'default' => 'htmlimage',
					),
					'cropping'     => array(
						'type'    => 'cropping',
						'default' => '',
					),
					'size'         => array(
						'type'    => 'size',
						'default' => '200',
					),
					'height'       => array(
						'type'    => 'height',
						'default' => '200',
					),
					'width'        => array(
						'type'    => 'width',
						'default' => '200',
					),
					'cssclasses'   => array(
						'type'    => 'cssclasses',
						'default' => '',
					),
				),
			)
		);
		$this->blocks_register_block_type(
			'loginform',
			array(
				'render_callback' => array( $this, 'render_block_loginform' ),
				'attributes'      => array(
					'content'    => array(
						'type'    => 'string',
						'default' => '',
					),
					'cssclasses' => array(
						'type'    => 'cssclasses',
						'default' => '',
					),
				),
			)
		);

	}

	/**
	 * Render_block_access_userpayperpost function
	 *
	 * @param [type] $attributes
	 * @return
	 */
	public function render_block_access_userpayperpost( $attributes ) {

		$sort          = $attributes['sort'];
		$sortby        = $attributes['sortby'];
		$liststyletype = $attributes['liststyletype'];

		$total         = $attributes['total'];
		$showmoretext  = $attributes['showmoretext'];
		$totalshowmore = $attributes['totalshowmore'];
		$buttonstyle   = $attributes['buttonstyle'];
		$ineditor      = $attributes['ineditor'];

		$shortcode = '[wlm_userpayperpost sort="' . $sort . '" sortby="' . $sortby . '" total="' . $total . '" liststyletype="' . $liststyletype . '" showmoretext="' . $showmoretext . '" totalshowmore="' . $totalshowmore . '" buttonstyle="' . $buttonstyle . '" ineditor="' . $ineditor . '"]';
		$output    = do_shortcode( $shortcode );
		return $output;
	}

	/**
	 * Render_block_profileform function
	 *
	 * @param [type] $attributes
	 * @return string
	 */
	public function render_block_profileform( $attributes ) {

		$content = $attributes['content'];

		$listsubscription = '';
		if ( $attributes['listsubscription'] ) {
			$listsubscription = ' list_subscription="show"';
		} else {
			$listsubscription = ' list_subscription="hide"';
		}
		$profile_photo = ' profile_photo="hide"';
		if ( $attributes['profile_photo'] ) {
			$profile_photo = ' profile_photo="show"';
		}
		$first_name = ' first_name="hide"';
		if ( $attributes['first_name'] ) {
			$first_name = ' first_name="show"';
		}
		$last_name = ' last_name="hide"';
		if ( $attributes['last_name'] ) {
			$last_name = ' last_name="show"';
		}
		$nickname = ' nickname="hide"';
		if ( $attributes['nickname'] ) {
			$nickname = ' nickname="show"';
		}
		$display_name = ' display_name="hide"';
		if ( $attributes['display_name'] ) {
			$display_name = ' display_name="show"';
		}
		$email = ' email="hide"';
		if ( $attributes['email'] ) {
			$email = ' email="show"';
		}
		$user_password = ' user_password="hide"';
		if ( $attributes['user_password'] ) {
			$user_password = ' user_password="show"';
		}
		$address = array();
		if ( $attributes['company'] ) {
			$address[] = 'company';
		}
		if ( $attributes['address1'] ) {
			$address[] = 'address1';
		}
		if ( $attributes['address2'] ) {
			$address[] = 'address2';
		}
		if ( $attributes['city'] ) {
			$address[] = 'city';
		}
		if ( $attributes['state'] ) {
			$address[] = 'state';
		}
		if ( $attributes['zip'] ) {
			$address[] = 'zip';
		}
		if ( $attributes['country'] ) {
			$address[] = 'country';
		}
		$address = count( $address ) ? ' address="' . implode( '|', $address ) . '"' : ' address="hide"';

		$shortcode = '[wlm_profileform' . $profile_photo . $first_name . $last_name . $nickname . $display_name . $email . $user_password . $listsubscription . $address . ']';
		$output    = do_shortcode( $shortcode );
		return '<div>' . $output . ' </div>';
	}

	/**
	 * Render_block_profilephoto function
	 *
	 * @param [type] $attributes
	 * @return string
	 */
	public function render_block_profilephoto( $attributes ) {

		$content      = $attributes['content'];
		$returnformat = $attributes['returnformat'];
		$cropping     = $attributes['cropping'];
		$size         = $attributes['size'];
		$height       = $attributes['height'];
		$width        = $attributes['width'];
		$cssclasses   = $attributes['cssclasses'];

		if ( '' !== $cssclasses ) {
			$cssclasses = ' class="' . $attributes['cssclasses'] . '"';
		}

		if ( 'urlonly' == $returnformat ) {
			$shortcode = '[wlm_profilephoto url_only="1"]';
		} else {
			if ( '' == $cropping ) {
				$shortcode = '[wlm_profilephoto height="' . $height . '" width="' . $width . '" ' . $cssclasses . ']';
			} else {
				$shortcode = '[wlm_profilephoto cropping="' . $cropping . '" size="' . $size . '" ' . $cssclasses . ' ]';
			}
		}

		$output = do_shortcode( $shortcode );
		return '<div>' . $output . ' </div>';
	}

	/**
	 * Render_block_loginform function
	 *
	 * @param [type] $attributes
	 * @return string
	 */
	public function render_block_loginform( $attributes ) {

		$content    = $attributes['content'];
		$cssclasses = $attributes['cssclasses'];

		if ( '' !== $cssclasses ) {
			$cssclasses = ' class="' . $attributes['cssclasses'] . '"';
		}

		$shortcode = '[wlm_loginform ' . $cssclasses . ']';

		$output = do_shortcode( $shortcode );
		return '<div>' . $output . ' </div>';
	}

	/**
	 * Render_block_access_memberlevels function
	 *
	 * @param array $attributes
	 * @return string
	 */
	public function render_block_access_memberlevels( $attributes ) {

		$content   = $attributes['content'];
		$shortcode = '[wlm_memberlevel]';
		$output    = do_shortcode( $shortcode );
		return '<div>' . $output . ' </div>';
	}
}
