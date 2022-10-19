<div
	data-process="modal"
	id="configure-<?php echo esc_attr( $config['id'] ); ?>-template" 
	data-id="configure-<?php echo esc_attr( $config['id'] ); ?>"
	data-label="configure-<?php echo esc_attr( $config['id'] ); ?>"
	data-title="<?php echo esc_attr( $config['name'] ); ?> Configuration"
	data-show-default-footer="1"
	style="display:none">
	<div class="body">
		<div class="row -integration-keys">
			<?php echo wp_kses_post( $api_status_markup ); ?>
			<div class="col-md-12">
				<p><?php esc_html_e( 'Copy the API URL and API Key from the Account > Integrations & API > API section of GetResponse and paste them into the appropriate fields.', 'wishlist-member' ); ?></p>
				<?php if ( isset( $data['api_url'] ) && false !== strpos( $data['api_url'], 'api2' ) ) : ?>
					<p class="text-danger"><?php esc_html_e( 'You are using an old version of GetResponse API. Please change your API URL to "https://api.getresponse.com/v3"', 'wishlist-member' ); ?></p>
				<?php endif; ?>
			</div>
			<template class="wlm3-form-group">{label : '<?php esc_js_e( 'API URL', 'wishlist-member' ); ?>', type : 'text', name : 'api_url', column : 'col-md-12'}</template>
			<template class="wlm3-form-group">{label : '<?php esc_js_e( 'API Key', 'wishlist-member' ); ?>', type : 'text', name : 'apikey', column : 'col-md-12'}</template>
		</div>
	</div>
</div>
