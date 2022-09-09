<?php 

function api_get_user($request) {

    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0) {
        $user_meta = get_user_meta($user_id);

        $response = array(
            "id" => $user->user_login,
            "name" => $user->display_name,
            "email" => $user->user_email,
            "zip_code" => $user_meta['zip_code'][0],
            "address" => $user_meta['address'][0],
            "house_number" => $user_meta['house_number'][0],
            "district" => $user_meta['district'][0],
            "city" => $user_meta['city'][0],
            "state" => $user_meta['state'][0],
        );
    } else {
        $response = new WP_Error('permissão', 'usuario não possui permissão', array('status' => 401));
    }

    return rest_ensure_response($response);
}