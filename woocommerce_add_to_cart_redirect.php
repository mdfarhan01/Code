<?php

add_filter('woocommerce_add_to_cart_redirect', 'farhan_redirect_to_checkout');
function farhan_redirect_to_checkout( $url ) {
    return wc_get_checkout_url();
}

add_action('template_redirect', 'farhan_skip_cart_page');
function farhan_skip_cart_page() {
    if ( is_cart() ) {
        wp_safe_redirect( wc_get_checkout_url() );
        exit;
    }
}

add_action( 'wp_footer', 'farhan_redirect_after_add_to_cart_js' );
function farhan_redirect_after_add_to_cart_js() {
    if ( is_admin() ) return;
    $checkout_url = esc_js( wc_get_checkout_url() );
    ?>
    <script type="text/javascript">
    (function($){
        // WooCommerce fires 'added_to_cart' on document.body after successful AJAX add-to-cart
        $(document.body).on('added_to_cart', function(){
            window.location.href = '<?php echo $checkout_url; ?>';
        });

        $(document).on('click', '.add_to_cart_button, form.cart .single_add_to_cart_button', function(e){
            // short delay to allow normal AJAX to start (adjust if needed)
            setTimeout(function(){
                window.location.href = '<?php echo $checkout_url; ?>';
            }, 600);
        });
        */
    })(jQuery);
    </script>
    <?php
}






// 🚀 Add to cart করার সাথে সাথেই checkout page এ রিডাইরেক্ট হবে
add_filter('woocommerce_add_to_cart_redirect', 'farhan_direct_checkout_redirect');
function farhan_direct_checkout_redirect() {
    return wc_get_checkout_url();
}

// 🧹 পুরানো cart clear করে দেবে যেন শুধুমাত্র নতুন প্রোডাক্ট থাকে
add_filter('woocommerce_add_to_cart_validation', 'farhan_clear_cart_before_add', 10, 3);
function farhan_clear_cart_before_add($passed, $product_id, $quantity) {
    if (WC()->cart->get_cart_contents_count() > 0) {
        WC()->cart->empty_cart();
    }
    return $passed;
}

// ⚙️ AJAX add-to-cart এর ক্ষেত্রেও কাজ করানোর জন্য
add_action('wp_footer', 'farhan_redirect_after_ajax_add_to_cart');
function farhan_redirect_after_ajax_add_to_cart() {
    if (is_admin()) return;
    $checkout_url = esc_js(wc_get_checkout_url());
    ?>
    <script type="text/javascript">
    jQuery(function($){
        $(document.body).on('added_to_cart', function(){
            window.location.href = '<?php echo $checkout_url; ?>';
        });
    });
    </script>
    <?php
}

