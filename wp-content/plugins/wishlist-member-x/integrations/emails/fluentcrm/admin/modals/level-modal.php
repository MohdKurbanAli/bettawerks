<?php
$level_actions = array(
	'add'    => __( 'When Added', 'wishlist-member' ),
	'cancel' => __( 'When Cancelled', 'wishlist-member' ),
	'remove' => __( 'When Removed', 'wishlist-member' ),
	'rereg'  => __( 'When Re-Registered', 'wishlist-member' ),
);
?>
<?php foreach ( $wpm_levels as $level_id => $level ) : ?>
<div data-process="modal" id="fluentcrm-levels-<?php echo esc_attr( $level_id ); ?>-template" data-id="fluentcrm-levels-<?php echo esc_attr( $level_id ); ?>" data-label="fluentcrm-levels-<?php echo esc_attr( $level_id ); ?>"
	data-title="Editing Level Actions for <strong><?php echo esc_attr( $level['name'] ); ?></strong>" data-show-default-footer="1" data-classes="modal-lg modal-fluentcrm-actions" style="display:none">
	<div class="body">
		<ul class="nav nav-tabs">
			<?php foreach ( $level_actions as $key => $value ) : ?>
			<li class="<?php echo esc_attr( 'add' === $key ? 'active' : '' ); ?> nav-item"><a class="nav-link" data-toggle="tab" href="#fluentcrm-when-<?php echo esc_attr( $key ); ?>-<?php echo esc_attr( $level_id ); ?>"><?php echo esc_html( $value ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content">
			<?php foreach ( $level_actions as $key => $value ) : ?>
			<div class="tab-pane <?php echo esc_attr( 'add' === $key ? 'active in' : '' ); ?>" id="fluentcrm-when-<?php echo esc_attr( $key ); ?>-<?php echo esc_attr( $level_id ); ?>">
				<div class="horizontal-tabs">
					<div class="row no-gutters">
						<div class="col-12 col-md-auto">
							<!-- Nav tabs -->
							<div class="horizontal-tabs-sidebar" style="min-width: 120px;">
								<ul class="nav nav-tabs -h-tabs flex-column" role="tablist">
									<li role="presentation" class="nav-item">
										<a href="#<?php echo esc_attr( $level_id ); ?>-<?php echo esc_attr( $key ); ?>-fluentcrm-tag" class="nav-link pp-nav-link active" aria-controls="tag" role="tab" data-type="tag" data-title="Tag Actions" data-toggle="tab">Tag</a>
									</li>
									<li role="presentation" class="nav-item">
										<a href="#<?php echo esc_attr( $level_id ); ?>-<?php echo esc_attr( $key ); ?>-fluentcrm-list" class="nav-link pp-nav-link" aria-controls="list" role="tab" data-type="list" data-title="List Actions" data-toggle="tab">List</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col">
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="<?php echo esc_attr( $level_id ); ?>-<?php echo esc_attr( $key ); ?>-fluentcrm-tag">
									<div class="col-md-12">
										<div class="form-group">
											<label><?php esc_html_e( 'Add Tags', 'wishlist-member' ); ?></label>
											<select class="fluentcrm-tags-select" multiple="multiple" data-placeholder="Select Tags..." style="width:100%" name="fluentcrm_settings[level][<?php echo esc_attr( $level_id ); ?>][<?php echo esc_attr( $key ); ?>][apply_tag][]"></select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label><?php esc_html_e( 'Remove Tags', 'wishlist-member' ); ?></label>
											<select class="fluentcrm-tags-select" multiple="multiple" data-placeholder="Select Tags..." style="width:100%" name="fluentcrm_settings[level][<?php echo esc_attr( $level_id ); ?>][<?php echo esc_attr( $key ); ?>][remove_tag][]"></select>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="<?php echo esc_attr( $level_id ); ?>-<?php echo esc_attr( $key ); ?>-fluentcrm-list">
									<div class="col-md-12">
										<div class="form-group">
											<label><?php esc_html_e( 'Add to List', 'wishlist-member' ); ?></label>
											<select class="fluentcrm-lists-select" multiple="multiple" data-placeholder="Select Lists..." style="width:100%" name="fluentcrm_settings[level][<?php echo esc_attr( $level_id ); ?>][<?php echo esc_attr( $key ); ?>][apply_list][]"></select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label><?php esc_html_e( 'Remove from List', 'wishlist-member' ); ?></label>
											<select class="fluentcrm-lists-select" multiple="multiple" data-placeholder="Select Lists..." style="width:100%" name="fluentcrm_settings[level][<?php echo esc_attr( $level_id ); ?>][<?php echo esc_attr( $key ); ?>][remove_list][]"></select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endforeach; ?>
