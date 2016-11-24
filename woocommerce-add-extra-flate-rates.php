<?php


	add_filter( 'woocommerce_enable_deprecated_additional_flat_rates', '__return_true' );

//add_action( 'woocommerce_flat_rate_shipping_add_rate', 'add_another_custom_flat_rate', 10, 2 );

function add_another_custom_flat_rate( $method, $rate ) {
	$new_rate          = $rate;
	$new_rate['id']    .= ':' . '3day'; // Append a custom ID
	$new_rate['label'] = '3 day delivery'; // Rename to 'Rushed Shipping'
	$new_rate['cost']  += 13; // Add $2 to the cost



}
//add_action( 'woocommerce_flat_rate_shipping_add_rate', 'next_day_flat_rate', 10, 1);

function next_day_flat_rate( $method, $rate ) {
	$next_day          = $rate;
	$next_day['id']    .= ':' . 'next_day'; // Append a custom ID
	$next_day['label'] = 'Next day delivery'; // Rename to 'Rushed Shipping'
	$next_day['cost']  += 30; // Add $2 to the cost

	// Add it to WC
	$method->add_rate( $next_day );

}
