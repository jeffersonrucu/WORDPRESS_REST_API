<?php 

require_once($template_directory . "/usecase/product.php");


// PRODUCTS
add_action('rest_api_init', function () {
    register_rest_route("v1/api", "/product", array(
        array(
            "methods" => "GET",
            "callback" => "api_get_product"
        )
    ));
});