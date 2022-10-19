<?php
/**
 * Pabbly admin interface
 *
 * @package WishListMember\Integrations\Others\Pabbly
 */

require_once 'admin/init.php';

$all_tabs   = array(
	'settings' => 'Settings',
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
