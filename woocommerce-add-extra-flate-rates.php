<?php



add_action( 'woocommerce_flat_rate_shipping_add_rate', 'add_another_custom_flat_rate', 10, 2 );

function add_another_custom_flat_rate( $method, $rate ) {
	$new_rate          = $rate;
	$new_rate['id']    .= ':' . '3day'; // Append a custom ID
	$new_rate['label'] = '3 day delivery'; // Rename to 'Rushed Shipping'
	$new_rate['cost']  += 13; // Add $2 to the cost



}
