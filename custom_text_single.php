function woodmart_text_under_title(){
	echo '<p>TEXT HERE</p>';
}
add_action( 'woocommerce_single_product_summary', 'woodmart_text_under_title', 7 );
