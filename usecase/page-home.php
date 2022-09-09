<?php

define("SLUG_HOMEPAGE", "pagina-inicial");

function api_page_home() {
    $validate = validateToken(wp_get_current_user());

    if (!$validate) {
        return rest_ensure_response(
            responseError(ERROR_ACESS, 401)
        );
    }

    $args = array(
        'pagename' => SLUG_HOMEPAGE
    );

    $page = new WP_Query( $args );
    $page = $page->posts[0];


    $response = [
        "title" => $page->post_title,
        "content" => $page->post_content,
        "banner" => get_field( "banner_primary", $page->ID)
    ];

    return rest_ensure_response($response, array("status" => 200));
}