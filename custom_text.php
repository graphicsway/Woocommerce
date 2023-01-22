add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_show_free_shipping_loop', 5 );
 
function bbloomer_show_free_shipping_loop() {
   echo '<p align="center" class="shop-badge">TEXT HERE</p>';
}
