<form>
	<div class="row">
		<?php echo wp_kses_post( $pp_upgrade_instructions ); ?>
		<div class="col-auto mb-4"><?php echo wp_kses_post( $config_button ); ?></div>
	</div>
	<input type="hidden" class="-url" name="payflowthankyou" />
	<input type="hidden" name="action" value="admin_actions" />
	<input type="hidden" name="WishListMemberAction" value="save" />
</form>
