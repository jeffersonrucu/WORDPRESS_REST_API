<?php

define("SLUG_HOMEPAGE", "pagina-inicial");

function api_page_home() {
    // validate user
    $validate = validateToken(wp_get_current_user());
    if (!$validate) {
        return rest_ensure_response(
            responseError(ERROR_ACESS, 401)
        );
    }

    // filter page
    $args = array(
        'pagename' => SLUG_HOMEPAGE
    );
    $page = new WP_Query( $args );
    $page = $page->posts[0];
      
    // groups acf
    $banner_primary = get_field( "banner_primary", $page->ID);

    $response = [
        "hero" => [
            "title"     => $banner_primary["title"],
            "sub-title" => $banner_primary["sub_title"],
            "buttons"   => $banner_primary["buttons"],
            "image"     => [
                "ID"    =>  $banner_primary["image"]["ID"],
                "alt"   =>  $banner_primary["image"]["alt"],
                "sizes"   =>  [
                    "xl" => $banner_primary["image"]["sizes"]["1536x1536"]
                ],
            ]
        ]
    ];

    return rest_ensure_response($response, array("status" => 200));
}