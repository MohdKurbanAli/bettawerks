<div role="tabpanel" class="tab-pane" id="" data-id="levels_actions">
			<p class="float-left"><em>
				<?php
					// If WordPress Timezone is just 'UTC', set DateTimeZone paramater to null to prevent returning an "Unknown or bad timezone" error.
					 $this->get_wp_tzstring( true ) === 'UTC' ? $date_timezone = null : $date_timezone = new DateTimeZone( $this->get_wp_timezone() ) ;
					 
					// Translators: 1: Date/Time , 2: Timezone.
					printf( esc_html__( 'WordPress Time: %1$s %2$s', 'wishlist-member' ), esc_html(( new DateTime( 'now', $date_timezone ) )->format( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) )), esc_html($this->get_wp_tzstring( true )) );
				?>
			</em></p>
	<p class="text-right">
		<button data-toggle="modal" data-target="#level-actions" href="" class="btn -success -condensed">
			<i class="wlm-icons">add</i>
			<span><?php esc_html_e( 'Add Action', 'wishlist-member' ); ?></span>
		</button>
	</p>
	<div class="content-wrapper">
			<div class="table-wrapper table-responsive mb-0">
				<table class="table table-striped table-condensed" id="table-level-actions">
					<colgroup>
						<col>
						<col width="20%">
						<col width="100">
					</colgroup>
					<thead>
						<tr>
							<th class="action-table-title"></th>
							<th><?php esc_html_e( 'Schedule', 'wishlist-member' ); ?></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
	</div>
</div>
