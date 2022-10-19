<?php

if ( ! class_exists( 'WLM3_WebHooks_Hooks' ) ) {
	class WLM3_WebHooks_Hooks {
		public function __construct() {
			add_action( 'wp_ajax_wlm3_delete_incoming_webhook', array( $this, 'delete_incoming_webhook' ) );
		}

		/**
		 * Action: wp_ajax_wlm3_delete_incoming_webhook
		 *
		 * Deletes an incoming webhook configuration
		 */
		public function delete_incoming_webhook() {
			$setting = wishlistmember_instance()->get_option( 'webhooks_settings' );
			unset( $setting['incoming'][ wlm_post_data()[ 'id' ] ] );
			$setting = array_merge(
				array(
					'outgoing' => array(),
					'incoming' => array(),
				),
				$setting
			);
			wishlistmember_instance()->save_option( 'webhooks_settings', $setting );
			wp_send_json(
				array(
					'success' => true,
					'data'    => array(
						'webhooks_settings' => $setting,
					),
				)
			);
		}
	}
	new WLM3_WebHooks_Hooks();
}
