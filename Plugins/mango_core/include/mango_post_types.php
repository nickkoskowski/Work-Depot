<?php
/** Portfolio Post Type **/
function portfolio_post_type () {
    $labels = array (
        'name' => _x ( 'Portfolios', 'Portfolios', 'mango' ),
        'singular_name' => _x ( 'Portfolio', 'Portfolio', 'mango' ),
        'menu_name' => __ ( 'Portfolios', 'mango' ),
        'parent_item_colon' => __ ( 'Parent Portoflio:', 'mango' ),
        'all_items' => __ ( 'All Portoflios', 'mango' ),
        'view_item' => __ ( 'View Portoflio', 'mango' ),
        'add_new_item' => __ ( 'Add New Portoflio', 'mango' ),
        'add_new' => __ ( 'Add New', 'mango' ),
        'edit_item' => __ ( 'Edit Portoflio', 'mango' ),
        'update_item' => __ ( 'Update Portoflio', 'mango' ),
        'search_items' => __ ( 'Search Portoflio', 'mango' ),
        'not_found' => __ ( 'Not found', 'mango' ),
        'not_found_in_trash' => __ ( 'Not found in Trash', 'mango' ),
    );
    $rewrite = array (
        'slug' => 'portfolios',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array (
        'label' => __ ( 'Portfolio', 'mango' ),
        'description' => __ ( 'Portfolio Description', 'mango' ),
        'labels' => $labels,
        'supports' => array ( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
        'taxonomies' => array ( 'portfolio-category' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type ( 'portfolio', $args );
    $labels = array (
        'name' => __ ( 'Portfolio Categories', 'mango' ),
        'singular_name' => __ ( 'Portfolio Category', 'mango' ),
        'search_items' => __ ( 'Search Portfolio Category', 'mango' ),
        'all_items' => __ ( 'All Portfolio Category', 'mango' ),
        'parent_item' => __ ( 'Parent Portfolio Category', 'mango' ),
        'parent_item_colon' => __ ( 'Parent Portfolio Category:', 'mango' ),
        'edit_item' => __ ( 'Edit Portfolio Category', 'mango' ),
        'update_item' => __ ( 'Update Portfolio Category', 'mango' ),
        'add_new_item' => __ ( 'Add New Portfolio Category', 'mango' ),
        'new_item_name' => __ ( 'New Portfolio Category', 'mango' ),
        'menu_name' => __ ( 'Portfolio Categories', 'mango' )
    );
    $args = array (
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array (
            'slug' => 'portfolio',
            'hierarchical' => true
        )
    );
    register_taxonomy ( 'portfolio-category', 'portfolio', $args );
}
// Hook into the 'init' action
add_action ( 'init', 'portfolio_post_type', 0 );
/** Testimonials Post Type **/
function testimonials_post_type () {
    $labels = array (
        'name' => _x ( 'Testimonials', 'Testimonials', 'mango' ),
        'singular_name' => _x ( 'Testimonial', 'Testimonial', 'mango' ),
        'menu_name' => __ ( 'Testimonials', 'mango' ),
        'parent_item_colon' => __ ( 'Parent Testimonial:', 'mango' ),
        'all_items' => __ ( 'All Testimonial', 'mango' ),
        'view_item' => __ ( 'View Testimonial', 'mango' ),
        'add_new_item' => __ ( 'Add New Testimonial', 'mango' ),
        'add_new' => __ ( 'Add New', 'mango' ),
        'edit_item' => __ ( 'Edit Testimonial', 'mango' ),
        'update_item' => __ ( 'Update Testimonial', 'mango' ),
        'search_items' => __ ( 'Search Testimonial', 'mango' ),
        'not_found' => __ ( 'Not found', 'mango' ),
        'not_found_in_trash' => __ ( 'Not found in Trash', 'mango' ),
    );
    $rewrite = array (
        'slug' => 'testimonial',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array (
        'label' => __ ( 'Testimonial', 'mango' ),
        'description' => __ ( 'Testimonial Description', 'mango' ),
        'labels' => $labels,
        'supports' => array ( 'title', 'editor', 'revision', 'thumbnail' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type ( 'testimonial', $args );
}

// Hook into the 'init' action

add_action ( 'init', 'testimonials_post_type', 0 );
function clients_post_type () {
    $labels = array (
        'name' => _x ( 'Clients', 'Clients', 'mango' ),
        'singular_name' => _x ( 'Client', 'Client', 'mango' ),
        'menu_name' => __ ( 'Clients', 'mango' ),
        'parent_item_colon' => __ ( 'Parent Client:', 'mango' ),
        'all_items' => __ ( 'All Clients', 'mango' ),
        'view_item' => __ ( 'View Client', 'mango' ),
        'add_new_item' => __ ( 'Add New Client', 'mango' ),
        'add_new' => __ ( 'Add New', 'mango' ),
        'edit_item' => __ ( 'Edit Client', 'mango' ),
        'update_item' => __ ( 'Update Client', 'mango' ),
        'search_items' => __ ( 'Search Client', 'mango' ),
        'not_found' => __ ( 'Not found', 'mango' ),
        'not_found_in_trash' => __ ( 'Not found in Trash', 'mango' ),
    );
    $rewrite = array (
        'slug' => 'clients',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array (
        'label' => __ ( 'Clients', 'mango' ),
        'description' => __ ( 'Client Description', 'mango' ),
        'labels' => $labels,
        'supports' => array ( 'title', 'editor', 'revision', 'thumbnail' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type ( 'clients', $args );
}

// Hook into the 'init' action
add_action ( 'init', 'clients_post_type', 0 );

function mfields_set_default_object_terms ( $post_id, $post ) {
    if ( 'publish' === $post->post_status && $post->post_type === 'portfolio' ) {
        $defaults = array (
            'portfolio-category' => array ( 'uncategorized' )
        );
        $taxonomies = get_object_taxonomies ( $post->post_type );
        foreach ( (array)$taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms ( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists ( $taxonomy, $defaults ) ) {
                wp_set_object_terms ( $post_id, $defaults[ $taxonomy ], $taxonomy );
            }
        }
    }
}
add_action ( 'save_post', 'mfields_set_default_object_terms', 100, 2 );

function faqs_post_type () {
    $labels = array (
        'name' => _x ( 'FAQs', 'FAQs', 'mango' ),
        'singular_name' => _x ( 'FAQ', 'FAQ', 'mango' ),
        'menu_name' => __ ( 'FAQs', 'mango' ),
        'parent_item_colon' => __ ( 'Parent FAQs:', 'mango' ),
        'all_items' => __ ( 'All FAQs', 'mango' ),
        'view_item' => __ ( 'View FAQs', 'mango' ),
        'add_new_item' => __ ( 'Add New FAQs', 'mango' ),
        'add_new' => __ ( 'Add New', 'mango' ),
        'edit_item' => __ ( 'Edit FAQs', 'mango' ),
        'update_item' => __ ( 'Update FAQs', 'mango' ),
        'search_items' => __ ( 'Search FAQs', 'mango' ),
        'not_found' => __ ( 'Not found', 'mango' ),
        'not_found_in_trash' => __ ( 'Not found in Trash', 'mango' ),
    );
    $rewrite = array (
        'slug' => 'faqs',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array (
        'label' => __ ( 'FAQs', 'mango' ),
        'description' => __ ( 'FAQs Description', 'mango' ),
        'labels' => $labels,
        'supports' => array ( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies' => array ( 'faq-category' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type ( 'faq', $args );
    $labels = array (
        'name' => __ ( 'FAQs Categories', 'mango' ),
        'singular_name' => __ ( 'FAQs Category', 'mango' ),
        'search_items' => __ ( 'Search FAQs Category', 'mango' ),
        'all_items' => __ ( 'All FAQs Category', 'mango' ),
        'parent_item' => __ ( 'Parent FAQs Category', 'mango' ),
        'parent_item_colon' => __ ( 'Parent FAQs Category:', 'mango' ),
        'edit_item' => __ ( 'Edit FAQs Category', 'mango' ),
        'update_item' => __ ( 'Update FAQs Category', 'mango' ),
        'add_new_item' => __ ( 'Add New FAQs Category', 'mango' ),
        'new_item_name' => __ ( 'New FAQs Category', 'mango' ),
        'menu_name' => __ ( 'Categories', 'mango' )
    );
    $args = array (
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'show_in_nav_menus' => true,
        'rewrite' => array (
        'slug' => 'faq',
        'hierarchical' => true
        )
    );
    register_taxonomy ( 'faq-category', 'faq', $args );
}

// Hook into the 'init' action
add_action ( 'init', 'faqs_post_type', 0 );

/************* create custom post *****************/
if(!function_exists('mango_menu_block')){
    function mango_menu_block(){
        $labels = array(
            'name' => __( 'Block', 'mango' ),
            'singular_name' => __( 'Block', 'mango' ),
            'add_new' => __( 'Add New', 'mango' ),
            'add_new_item' => __( 'Add New Block', 'mango' ),
            'edit_item' => __( 'Edit Block', 'mango' ),
            'new_item' => __( 'New Block', 'mango' ),
            'view_item' => __( 'View Block', 'mango' ),
            'search_items' => __( 'Search Block', 'mango' ),
            'not_found' => __( 'No block found', 'mango' ),
            'not_found_in_trash' => __( 'No block member found in Trash', 'mango' ),
            'parent_item_colon' => __( 'Parent Block:', 'mango' ),
            'menu_name' => __( 'Block ', 'mango' ),
            'all_items' => __( 'All Block ', 'mango' ),
            'search_items' => __( 'No block found', 'mango' )
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'supports' => array( 'title', 'editor' ),
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'menu_icon' => 'dashicons-clipboard',
        );
        register_post_type( 'block', $args );
    }
    add_action( 'init', 'mango_menu_block' );
}
?>