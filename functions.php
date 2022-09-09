<?php

$template_directory = get_template_directory();

// Custom Post Type
require_once($template_directory . "/custom-post-type/product.php");
require_once($template_directory . "/custom-post-type/transacao.php");

// Utils
require_once($template_directory . "/utils/util.php");

// Response
require_once($template_directory . "/response/error.php");

// Routes
require_once($template_directory . "/routes/route.php");

add_action('jwt_auth_expire', 'expire_token');