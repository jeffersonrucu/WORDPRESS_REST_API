<?php

$template_directory = get_template_directory();

// Custom Post Type
require_once($template_directory . "/custom-post-type/product.php");
require_once($template_directory . "/custom-post-type/transacao.php");

// Endpoints
require_once($template_directory . "/endpoints/user-post.php");