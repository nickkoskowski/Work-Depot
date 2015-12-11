<?php
$themeshortcode = array (
    'alertlink', 'animatecontent', 'highlight', 'htmltag', 'm_label', 'zoomcharactor'
);
/**
 * Create Our Initialization Function
 */
function add_button () {
    if ( current_user_can ( 'edit_posts' ) && current_user_can ( 'edit_pages' ) && get_user_option ( 'rich_editing' ) == 'true' ) {
        add_filter ( 'mce_external_plugins', 'add_tinymce_plugin' );
        add_filter ( 'mce_buttons_3', 'register_button' );
    }
}

add_action ( 'init', 'add_button' );
/**
 * Register Button
 */
function register_button ( $buttons ) {
    global $themeshortcode, $post;
    array_push ( $buttons, implode ( ',', $themeshortcode ) );
    return $buttons;
}

/**
 * Register TinyMCE Plugin
 */
function add_tinymce_plugin ( $plugin_array ) {
    global $themeshortcode;
    foreach ( $themeshortcode as $plugin ) {
        if ( $plugin != '|' ) {
            $plugin_array[ $plugin ] = mangocore_template_url . '/tinymce/' . $plugin . '.js';
        }
    }
    return $plugin_array;
}

?>