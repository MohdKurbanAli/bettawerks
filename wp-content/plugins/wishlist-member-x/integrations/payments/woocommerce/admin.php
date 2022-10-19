<?php
/* Payment Integration : WooCommerce */
if ( ! class_exists( 'WooCommerce' ) ) {
	   printf( '<div><p>This integration requires the <a href="%s" target="_blank">WooCommerce</a> plugin.</p></div>', $config['link'] );
	   return;
}

require_once 'admin/init.php';

$all_tabs   = array(
	'products' => 'Products',
	// 'cancellations' => 'Cancellations',
	'tutorial' => 'Tutorial',
);
$active_tab = 'products';

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
