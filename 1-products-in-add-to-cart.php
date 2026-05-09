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
