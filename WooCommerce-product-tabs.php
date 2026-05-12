add_filter( 'woocommerce_product_tabs', 'custom_woocommerce_tabs_titles', 98 );

function custom_woocommerce_tabs_titles( $tabs ) {

    // Description tab title change
    if ( isset( $tabs['description'] ) ) {
        $tabs['description']['title'] = 'Product Details';
    }

    // Reviews tab title change
    if ( isset( $tabs['reviews'] ) ) {
        $tabs['reviews']['title'] = 'Customer Reviews';
    }

    return $tabs;
}
