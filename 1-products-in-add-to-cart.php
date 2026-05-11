add_filter( 'woocommerce_add_to_cart_validation', 'custom_prevent_duplicate_product', 10, 3 );

function custom_prevent_duplicate_product( $passed, $product_id, $quantity ) {

    // শুধু product 2825 এর জন্য
    if ( $product_id == 2825 ) {

        foreach ( WC()->cart->get_cart() as $cart_item ) {

            if ( $cart_item['product_id'] == 2825 ) {

                // already cart এ থাকলে আবার add হবে না
                return false;
            }
        }
    }

    return $passed;
}

/* direct checkout redirect */
add_filter( 'woocommerce_add_to_cart_redirect', function() {
    return wc_get_checkout_url();
});




/* =========================================
   Only 1 product allowed in cart at a time
   New product will replace old one
   ========================================= */

add_filter( 'woocommerce_add_to_cart_validation', 'single_item_cart_only', 10, 3 );

function single_item_cart_only( $passed, $product_id, $quantity ) {

    // Cart empty hole kichu korbe na
    if ( WC()->cart->is_empty() ) {
        return $passed;
    }

    // আগের সব product remove করে দিবে
    WC()->cart->empty_cart();

    return $passed;
}
