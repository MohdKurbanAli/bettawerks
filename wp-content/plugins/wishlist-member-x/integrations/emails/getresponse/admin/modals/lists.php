<?php
foreach ( $wpm_levels as $lid => $level ) :
	$level     = (object) $level;
	$level->id = $lid;
	?>
<div
	data-process="modal"
	id="getresponselegacy-lists-modal-<?php echo esc_attr( $level->id ); ?>-template" 
	data-id="getresponselegacy-lists-modal-<?php echo esc_attr( $level->id ); ?>"
	data-label="getresponselegacy-lists-modal-<?php echo esc_attr( $level->id ); ?>"
	data-title="Editing <?php echo esc_attr( $config['name'] ); ?> Settings for <?php echo esc_attr( $level->name ); ?>"
	data-show-default-footer="1"
	style="display:none">
	<div class="body">
		<div class="row">
			<template class="wlm3-form-group">
				{
					label : '<?php esc_js_e( 'Autoresponder Email', 'wishlist-member' ); ?>',
					type : 'text',
					name : 'email[<?php echo esc_attr( $level->id ); ?>]',
					column : 'col-12',
					'data-mirror-value' : '#getresponselegacy-email-<?php echo esc_attr( $level->id ); ?>',
					tooltip : '<?php esc_js_e( 'Create an auto responder email list in GetResponse and paste that email address into the Autoresponse Email field.', 'wishlist-member' ); ?>',
				}
			</template>
			<template class="wlm3-form-group">
				{
					label : '<?php esc_js_e( 'Unsubscribe Email', 'wishlist-member' ); ?>',
					type  : 'text',
					name  : 'remove[<?php echo esc_attr( $level->id ); ?>]',
					column : 'col-12',
					'data-mirror-value' : '#getresponselegacy-remove-<?php echo esc_attr( $level->id ); ?>',
					tooltip : '<?php esc_js_e( 'Create an Unsubscribe email list in GetResponse and paste that email address into the Autoresponse Email field.', 'wishlist-member' ); ?>',
				}
			</template>
		</div>
	</div>
</div>
	<?php
endforeach;
?>
