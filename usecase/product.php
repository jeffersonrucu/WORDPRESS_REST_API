<?php

function api_get_product($request) {
    $validate = validateToken(wp_get_current_user());

    if (!$validate) {
        return rest_ensure_response(
            responseError(ERROR_ACESS, 401)
        );
    }
    
    $args = array(
        'post_type'   => 'product',
        'order' => 'ASC'
    );

    $posts = get_posts( $args );
    $response = [];

    foreach ($posts as $key => $post) {
        $response[] = [
            "ID" => $post->ID,
            "post_title" => $post->post_title,

            // RETORNO DOS CAMPOS DO ACF PLUGIN
            "price" => get_field( "price", $post->ID ),
            "image" => [
                "ID" => get_field( "image", $post->ID )["ID"],
                "url" => get_field( "image", $post->ID )["url"],
                "sizes" => [
                    "thumbnail" => get_field( "image", $post->ID )["sizes"]["thumbnail"],
                    "medium" => get_field( "image", $post->ID )["sizes"]["medium"],
                    "medium_large" => get_field( "image", $post->ID )["sizes"]["medium_large"],
                    "large" => get_field( "image", $post->ID )["sizes"]["large"],
                    "xl" => get_field( "image", $post->ID )["sizes"]["1536x1536"],
                    "xxl" => get_field( "image", $post->ID )["sizes"]["2048x2048"]
                ]
            ]
        ];
    }

    return rest_ensure_response($response, array("status" => 200));
}