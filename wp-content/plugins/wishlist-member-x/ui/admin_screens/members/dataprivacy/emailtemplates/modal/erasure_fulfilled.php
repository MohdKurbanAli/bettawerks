<div
	id="data-privacy_erasure-fulfilled_markup" 
	data-id="data-privacy_erasure-fulfilled"
	data-label="data-privacy_erasure-fulfilled"
	data-title="Erasure Fulfilled Email"
	data-classes="modal-lg"
	data-show-default-footer=""
	style="display:none">
	<div class="body">
		<div class="row">
			<template class="wlm3-form-group">
				{
					label: '<?php esc_js_e( 'Subject', 'wishlist-member' ); ?>',
					type: 'text',
					name: 'privacy_email_template_delete_subject',
					group_class: '-label-addon mb-2',
					column : 'col-md-12',
					class: 'email-subject'
				}
			</template>
			<template class="wlm3-form-group">
				{
					name: 'privacy_email_template_delete',
					type: 'richtext',
					group_class: 'mb-2',
					column : 'col-md-12'			
				}
			</template>
			<div class="col-md-12">
				<button class="btn -default -condensed email-reset-button" data-target="privacy_email_template_delete"><?php esc_html_e( 'Reset to Default', 'wishlist-member' ); ?></button>
				<template class="wlm3-form-group">
					{
						type : 'select',
						column : 'col-md-5 pull-right no-margin no-padding',
						'data-placeholder' : '<?php esc_js_e( 'Insert Merge Codes', 'wishlist-member' ); ?>',
						group_class : 'shortcode_inserter',
						style : 'width: 100%',
						options : get_merge_codes([{value : '[incregurl]', text : wlm.translate('Incomplete Registration URL')}]),
						grouped: true,
						class : 'insert_text_at_caret',
						'data-target' : '[name=privacy_email_template_delete]'
					}
				</template>
			</div>
		</div>
	</div>
	<div class="footer">
		<?php echo wp_kses_post( $modal_footer ); ?>
	</div>
</div>
