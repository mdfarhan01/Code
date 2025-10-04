<?php

add_filter( 'woocommerce_package_rates', 'custom_shipping_logic_based_on_cart_total', 10, 2 );
function custom_shipping_logic_based_on_cart_total( $rates, $package ) {
    $cart_total = WC()->cart->get_subtotal();

    // If cart total >= 400, hide Flat Rate
    if ( $cart_total >= 400 ) {
        foreach ( $rates as $rate_id => $rate ) {
            if ( 'flat_rate' === $rate->method_id ) {
                unset( $rates[$rate_id] );
            }
        }
    }

    // If cart total < 400, hide Free Shipping
    if ( $cart_total < 400 ) {
        foreach ( $rates as $rate_id => $rate ) {
            if ( 'free_shipping' === $rate->method_id ) {
                unset( $rates[$rate_id] );
            }
        }
    }

    return $rates;
}





//***************************** Pickup location hide in a minimum amount ********************************************** 


add_filter( 'woocommerce_package_rates', 'custom_shipping_logic_based_on_cart_total', 10, 2 );
function custom_shipping_logic_based_on_cart_total( $rates, $package ) {
    $cart_total = WC()->cart->get_subtotal();

    // If cart total >= 50, hide Local Pickup
    if ( $cart_total >= 50 ) {
        foreach ( $rates as $rate_id => $rate ) {
            if ( 'local_pickup' === $rate->method_id ) {
                unset( $rates[$rate_id] );
            }
        }
    }

    // If cart total < 50, hide Free Shipping
    if ( $cart_total < 50 ) {
        foreach ( $rates as $rate_id => $rate ) {
            if ( 'free_shipping' === $rate->method_id ) {
                unset( $rates[$rate_id] );
            }
        }
    }

    return $rates;
}



?>
