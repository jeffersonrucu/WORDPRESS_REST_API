<?php

function remove_item_menu_admin() {
    if (!current_user_can('administrator')) {
        // remove_menu_page('upload.php'); // Media
        remove_menu_page('link-manager.php'); // Links
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('profile.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
    }
    
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comments
}

function allowed_block_types( $allowed_blocks, $editor_context ) {
 
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
        'core/code',
        'core/quote',
        'core/heading',
        'core/buttons',
        'core/post-date',
        'core/post-author',
        'core/heading',
	);
 
}