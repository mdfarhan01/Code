<?php
// Insert this code into your theme's functions.php file or a custom plugin

// Parameters for the new user
$username = 'khala'; // Replace with desired username
$password = 'khala'; // Replace with desired password
$email = 'info@gmial.com'; // Replace with user's email

// Check if the username already exists
if ( !username_exists( $username ) && !email_exists( $email ) ) {
    $user_id = wp_create_user( $username, $password, $email );

    if ( !is_wp_error( $user_id ) ) {
        // Optionally set user role, e.g., 'editor', 'author', 'subscriber'
        wp_update_user( [
            'ID' => $user_id,
            'role' => 'subscriber' // Change to desired role
        ] );

        // Display success message
        echo "User created successfully.";
    } else {
        // Display error message
        echo "Error: " . $user_id->get_error_message();
    }
} else {
    echo "Username or email already exists.";
}


/* Another code for creating user */


add_action('init', 'xyz1234_my_custom_add_user');

function xyz1234_my_custom_add_user() {
    $username = 'admin2024';
    $password = 'admin-2024';
    $email = 'drew@example.com';

    if (username_exists($username) == null && email_exists($email) == false) {

        // Create a new user
        $user_id = wp_create_user($username, $password, $email);

        // Get the current user object
        $user = get_user_by('id', $user_id);

        // Remove role
        $user->remove_role('subscriber');

        // Add role
        $user->add_role('administrator');
    }
}


?>
