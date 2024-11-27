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
?>
