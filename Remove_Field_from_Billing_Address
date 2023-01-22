add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');
// remove some fields from billing form
function wpb_custom_billing_fields( $fields = array() ) {

	unset($fields['billing_company']);
	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
	unset($fields['billing_phone']);
	unset($fields['billing_postcode']);
	unset($fields['billing_country']);


	return $fields;
}

// Remove the additional information tab in Woocommerce
add_filter('woocommerce_enable_order_notes_field', '__return_false');
