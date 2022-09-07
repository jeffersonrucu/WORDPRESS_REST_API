<?php 

function api_user_post($request) {

    // Get Request
    $user_password      = $request["password"];
    $user_email         = sanitize_email     ( $request["email"] );
    $user_name          = sanitize_text_field( $request["name"] );
    $user_address       = sanitize_text_field( $request["address"] );
    $user_zip_code      = sanitize_text_field( $request["zip_code"] );
    $user_house_number  = sanitize_text_field( $request["house_number"] );
    $user_district      = sanitize_text_field( $request["district"] );
    $user_city          = sanitize_text_field( $request["city"] );
    $user_state         = sanitize_text_field( $request["state"] );

    // Valid User
    $username_exist = username_exists( $user_email );
    $email_exist    = email_exists( $user_email );

    if(!$username_exist && !$email_exist && $user_email && $user_password) {
        $user_id = wp_create_user( $user_email, $user_password, $user_email );

        $response = array(
            "ID"                => $user_id,
            "display_name"      => $user_name,
            "first_name"        => $user_name,
            "role"              => "subscriber"
        );

        wp_update_user($response);
        update_user_meta($user_id, 'address', $user_address );
        update_user_meta($user_id, 'zip_code', $user_zip_code );
        update_user_meta($user_id, 'house_number', $user_house_number );
        update_user_meta($user_id, 'district', $user_district );
        update_user_meta($user_id, 'city', $user_city );
        update_user_meta($user_id, 'state', $user_state );

    } else {
        $response = new WP_Error('email', 'E-mail já cadastrado', array('status' => 403));
    }

    return rest_ensure_response($response);
}

function register_api_user_post() {
    register_rest_route("v1/api", "/usuario", array(
        array(
            "methods" => "POST",
            "callback" => "api_user_post"
        )
    ));
}

add_action('rest_api_init', 'register_api_user_post');
