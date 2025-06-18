<?php 


// Custom shipping title for local pickup
add_filter( 'woocommerce_shipping_method_title', 'custom_pickup_title', 10, 2 );
function custom_pickup_title( $title, $method ) {
    if ( $method->id === 'local_pickup' ) {
        return 'Buy and Pick Up (Showroom)';
    }
    return $title;
}

// Add pickup instructions in order email
add_action( 'woocommerce_email_after_order_table', 'add_pickup_note_to_email', 20, 4 );
function add_pickup_note_to_email( $order, $sent_to_admin, $plain_text, $email ) {
    foreach ( $order->get_shipping_methods() as $method ) {
        if ( $method->get_method_id() === 'local_pickup' ) {
            echo '<p><strong>Pickup Location:</strong> 123 Gulshan Avenue, Dhaka</p>';
        }
    }
}



?>
