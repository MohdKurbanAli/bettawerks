<?php
/* Payment Integration : PayPal Payments Standard */
require dirname( __DIR__ ) . '/paypal/assets/common.php';
require_once 'admin/init.php';

$all_tabs   = array(
	'settings' => 'Settings',
	'products' => 'Products',
	'tutorial' => 'Tutorial',
);
$active_tab = 'settings';

echo '<ul class="nav nav-tabs">';
foreach ( $all_tabs as $k => $v ) {
	$active = $active_tab === $k ? 'active' : '';
	printf( '<li class="%s nav-item"><a class="nav-link" data-toggle="tab" href="#%s_%s">%s</a></li>', esc_attr( $active ), esc_attr( $config['id'] ), esc_attr( $k ), esc_html( $v ) );
}
echo '</ul>';
echo '<div class="tab-content">';
foreach ( $all_tabs as $k => $v ) {
	$active = $active_tab === $k ? 'active in' : '';
	printf( '<div id="%s_%s" class="tab-pane %s">', esc_attr( $config['id'] ), esc_attr( $k ), esc_attr( $active ) );
	include_once 'admin/tabs/' . $k . '.php';
	echo '</div>';
}
echo '</div>';

wlm_print_script( plugin_dir_url( __FILE__ ) . 'assets/admin.js' );
wlm_print_style( plugin_dir_url( __FILE__ ) . 'assets/admin.css' );

