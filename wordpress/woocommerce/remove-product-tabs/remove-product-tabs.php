<?php
/**
 * WooCommerce: remove default product tabs from the single product page.
 *
 * This snippet allows you to remove one or more of the default WooCommerce
 * product tabs (description, reviews, additional information) by unsetting
 * them from the product tabs array.
 *
 * Place this code in your theme's functions.php file (preferably a child theme)
 * or inside a custom utility plugin.
 */

add_filter( 'woocommerce_product_tabs', 'jt_wc_remove_product_tabs', 11 );

function jt_wc_remove_product_tabs( $tabs ) {

	$remove = array(
		'description',
		'reviews',
		'additional_information',
	);

	foreach ( $remove as $key ) {
		if ( isset( $tabs[ $key ] ) ) {
			unset( $tabs[ $key ] );
		}
	}

	return $tabs;
}
