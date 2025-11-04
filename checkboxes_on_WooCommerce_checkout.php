// Add custom acknowledgement and age confirmation checkboxes on WooCommerce checkout
add_action('woocommerce_review_order_before_submit', 'labsourced_custom_checkout_checkboxes', 9);
function labsourced_custom_checkout_checkboxes() {
    echo '<div class="custom-checkout-agreement">';
    
    // Checkbox 1: Terms & Research Disclaimer
    woocommerce_form_field('acknowledgement_checkbox', array(
        'type'    => 'checkbox',
        'class'   => array('form-row privacy'),
        'label'   => __('I agree to the <a href="/terms-and-conditions" target="_blank">Terms and Conditions</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a> of this website. I understand that all products are sold <strong>for Research Use Only</strong>, not for human consumption, and that the seller assumes no liability for misuse.', 'woocommerce'),
        'required' => true,
    ));

    // Checkbox 2: Age Confirmation
    woocommerce_form_field('age_confirmation_checkbox', array(
        'type'    => 'checkbox',
        'class'   => array('form-row age-confirm'),
        'label'   => __('I confirm that I am <strong>over the age of 21</strong> and legally permitted to purchase research materials in my jurisdiction.', 'woocommerce'),
        'required' => true,
    ));

    echo '</div>';
}

// Validation before order submission
add_action('woocommerce_checkout_process', 'labsourced_validate_custom_checkboxes');
function labsourced_validate_custom_checkboxes() {
    if (empty($_POST['acknowledgement_checkbox'])) {
        wc_add_notice(__('Please acknowledge the Terms, Conditions, and Research Use disclaimer.'), 'error');
    }
    if (empty($_POST['age_confirmation_checkbox'])) {
        wc_add_notice(__('Please confirm that you are over the age of 21.'), 'error');
    }
}

// Save checkbox data to order meta
add_action('woocommerce_checkout_update_order_meta', 'labsourced_save_custom_checkboxes');
function labsourced_save_custom_checkboxes($order_id) {
    if (!empty($_POST['acknowledgement_checkbox'])) {
        update_post_meta($order_id, 'Acknowledged_Terms', 'Yes');
    }
    if (!empty($_POST['age_confirmation_checkbox'])) {
        update_post_meta($order_id, 'Age_Confirmed', 'Yes');
    }
}




