<?php

$template_directory = get_template_directory();

// Custom Post Type
require_once($template_directory . "/custom-post-type/product.php");

// Utils
require_once($template_directory . "/utils/util.php");
require_once($template_directory . "/utils/config.php");
require_once($template_directory . "/utils/cors.php");

// Response
require_once($template_directory . "/response/error.php");

// Routes
require_once($template_directory . "/routes/route.php");

add_action('jwt_auth_expire', 'expire_token');
add_action( 'admin_init', 'remove_item_menu_admin' );
add_filter( 'allowed_block_types_all', 'allowed_block_types', 25, 2 );
