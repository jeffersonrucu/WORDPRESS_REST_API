<?php 

require_once($template_directory . "/usecase/post-product.php");
require_once($template_directory . "/usecase/page-home.php");


// POST PRODUCTS
add_action('rest_api_init', function () {
    register_rest_route("v1/api", "/product", array(
        array(
            "methods" => "GET",
            "callback" => "api_product_get"
        )
    ));
});

// PAGE HOME
add_action('rest_api_init', function () {
    register_rest_route("v1/api/page", "/home", array(
        array(
            "methods" => "GET",
            "callback" => "api_page_home"
        )
    ));
});