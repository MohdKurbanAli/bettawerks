<?php

/*
 * shopping cart array
 */

global $wishlist_member_shopping_carts;

$wishlist_member_shopping_carts = array(
	'integration.shoppingcart.plugnpaid.php' => array(
		'name' => 'plugnpaid',
		'handler' => true,
	),
	'integration.shoppingcart.woocommerce.php' => array(
		'name' => 'woocommerce',
		'handler' => true,
	),
	'integration.shoppingcart.1shoppingcart.php' => array(
		'classname' => 'WLM_INTEGRATION_1SHOPPINGCART',
		'optionname' => 'scthankyou',
		'methodname' => 'OneShoppingCart',
		'load_init_file' => true,
	),
	'integration.shoppingcart.ultracart.php' => array(
		'classname' => 'WLM_INTEGRATION_ULTRACART',
		'optionname' => 'ultracartthankyou',
		'methodname' => 'UltraCartSC',
	),
	'integration.shoppingcart.twoco.php' => array(
		'classname' => 'WLM_INTEGRATION_TWOCO',
		'optionname' => 'twocothankyou',
		'methodname' => 'TwocoSC',
	),
	'integration.shoppingcart.spreedly.php' => array(
		'classname' => 'WLM_INTEGRATION_SPREEDLY',
		'optionname' => 'spreedlythankyou',
		'methodname' => 'Spreedly',
	),
	'integration.shoppingcart.redoakcart.php' => array(
		'classname' => 'WLM_INTEGRATION_REDOAKCART',
		'optionname' => 'redoakcartthankyou',
		'methodname' => 'RedOakCart',
	),
	'integration.shoppingcart.recurly.php' => array(
		'classname' => 'WLM_INTEGRATION_RECURLY',
		'optionname' => 'recurlythankyou',
		'methodname' => 'recurly',
	),
	'integration.shoppingcart.quickpaypro.php' => array(
		'classname' => 'WLM_INTEGRATION_QUICKPAYPRO',
		'optionname' => 'qppthankyou',
		'methodname' => 'QuickPayPro',
	),
	'integration.shoppingcart.premiumwebcart.php' => array(
		'classname' => 'WLM_INTEGRATION_PREMIUMWEBCART',
		'optionname' => 'pwcthankyou',
		'methodname' => 'PremiumWebCartSC',
	),
	'integration.shoppingcart.payflow.php' => array(
		'classname' => 'WLM_INTEGRATION_PAYPALPAYFLOW',
		'optionname' => 'payflowthankyou',
		'methodname' => 'paypalpayflow',
		'load_init_file' => true,
	),
	'integration.shoppingcart.paypalpro.php' => array(
		'classname' => 'WLM_INTEGRATION_PAYPALPRO',
		'optionname' => 'paypalprothankyou',
		'methodname' => 'paypalpro',
		'load_init_file' => true,
	),
	'integration.shoppingcart.paypalec.php' => array(
		'classname' => 'WLM_INTEGRATION_PAYPALEC',
		'optionname' => 'paypalecthankyou',
		'methodname' => 'paypalec',
		'load_init_file' => true,
	),
	'integration.shoppingcart.paypal.php' => array(
		'classname' => 'WLM_INTEGRATION_PAYPAL',
		'optionname' => 'ppthankyou',
		'methodname' => 'Paypal',
		'load_init_file' => true,
	),
	'integration.shoppingcart.infusionsoft.php' => array(
		'classname' => 'WLM_INTEGRATION_INFUSIONSOFT',
		'optionname' => 'isthankyou',
		'methodname' => 'infusionsoft',
	),
	'integration.shoppingcart.eway.php' => array(
		'classname' => 'WLM_INTEGRATION_EWAY',
		'optionname' => 'ewaythankyouurl',
		'methodname' => 'eway_process',
	),
	'integration.shoppingcart.generic.php' => array(
		'classname' => 'WLM_INTEGRATION_GENERIC',
		'optionname' => 'genericthankyou',
		'methodname' => 'GenericSC',
	),
	'integration.shoppingcart.cydec.php' => array(
		'classname' => 'WLM_INTEGRATION_CYDEC',
		'optionname' => 'cydecthankyou',
		'methodname' => 'Cydec',
	),
	'integration.shoppingcart.clickbank.php' => array(
		'classname' => 'WLM_INTEGRATION_CLICKBANK',
		'optionname' => 'cbthankyou',
		'methodname' => 'ClickBank',
	),
	'integration.shoppingcart.authorizenet.php' => array(
		'classname' => 'WLM_INTEGRATION_AuthorizeNet',
		'optionname' => 'anthankyou',
		'methodname' => 'AuthorizeNet',
	),
	'integration.shoppingcart.stripe.php' => array(
		'classname' => 'WLM_INTEGRATION_STRIPE',
		'optionname' => 'stripethankyou',
		'methodname' => 'stripe',
		'php_minimum' => '5.4',
		'php_minimum_msg' => '<p>Warning: Your WishList Member integration with Stripe has been disabled.</p>
<p>Recent updates made by Stripe in their API require all 3rd party integrations to use PHP 5.4 or higher.</p>
<p>It appears your hosting/server environment does not meet this requirement. <a href="http://wlplink.com/go/stripe-php" target="_blank">CLICK HERE to find out how to re-enable it.</a></p>',
		'active_indicators' => array( 'stripeapikey', 'stripepublishablekey' ),
		'load_init_file' => true,
	),
	'integration.shoppingcart.twoco-api.php' => array(
		'classname' => 'WLM_INTEGRATION_TWOCO_API',
		'optionname' => 'twocheckoutapithankyouurl',
		'methodname' => 'twoco_api_process',
		'load_init_file' => true,
	),
	'integration.shoppingcart.authorizenet-arb.php' => array(
		'classname' => 'WLM_INTEGRATION_AUTHORIZENET_ARB',
		'optionname' => 'anetarbthankyou',
		'methodname' => 'authorizenet_arb',
		'load_init_file' => true,
	),
	'integration.shoppingcart.samcart.php' => array(
		'classname' => 'WLM_INTEGRATION_SAMCART',
		'optionname' => 'samcartthankyou',
		'methodname' => 'SamcartSC',
	),
	'integration.shoppingcart.jvzoo.php' => array(
		'classname' => 'WLM_INTEGRATION_JVZOO',
		'optionname' => 'jvzoothankyou',
		'methodname' => 'JVZoo',
	),
	'integration.shoppingcart.payblue.php' => array(
		'classname' => 'WLM_INTEGRATION_PAYBLUE',
		'optionname' => 'paybluethankyou',
		'methodname' => 'PayBlueSC',
	),
);

return $wishlist_member_shopping_carts;
