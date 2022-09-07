<?php
function create_custom_post_type_product() {
    /*
     * Os $labels descrevem como o tipo da postagem ira aparecer.
     */
    $labels = array(
        'name'          => 'Produtos',  // Plural name
        'singular_name' => 'Produto'    // Singular name
    );

    /*
     * O parâmetro $supports descreve o que o tipo de postagem suporta
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * O parâmetro $args contém parâmetros importantes para o tipo de postagem personalizado
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Adicione nessa postagem todos os produtos necessários',       // Description
        'supports'            => $supports,
        'taxonomies'          => array( 'category', 'post_tag' ),                               // Allowed taxonomies
        'rewrite'             => array('slug' => 'produto', 'with_front' => true),
        'capability_type'     => 'post',                                                        // Allows read, edit, delete like “Post”
        'hierarchical'        => false,                                                         // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,                                                          // Makes the post type public
        'show_ui'             => true,                                                          // Displays an interface for this post type
        'show_in_menu'        => true,                                                          // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,                                                          // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,                                                          // Displays in the black admin bar
        'menu_position'       => 5,                                                             // The position number in the left menu
        'menu_icon'           => true,                                                          // The URL for the icon used for this post type
        'can_export'          => true,                                                          // Allows content export using Tools -> Export
        'has_archive'         => true,                                                          // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false,                                                         // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,                                                          // Allows queries to be performed on the front-end part if set to true
    );

    register_post_type('product', $args); //Crie um tipo de postagem com o slug como 'produto' e argumentos em $args.
}

add_action('init', 'create_custom_post_type_product');