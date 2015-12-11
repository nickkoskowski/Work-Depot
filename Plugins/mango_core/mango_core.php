<?php
/*
Plugin Name: Mango Core
Description: Mango Content Types, Shortcodes, Widgets and Visual composer elements extended.
Version: 2.0.1
Author: SW.THEMES
Author URI: http://newsmartwave.net/
*/


define( 'mangocore_template_js', plugin_dir_url ( __FILE__ ) . 'js' );
define( 'mangocore_template_css', plugin_dir_url ( __FILE__ ) . 'css' );
define( 'mangocore_template_url', plugin_dir_url ( __FILE__ ) );
define( 'mangocore_template_dir', plugin_dir_path ( __FILE__ ) );

load_plugin_textdomain ( mangocore_template_dir . '/lang' );


/* Load Admin js enqueue */

function mangocore_adminload_script () {
    wp_enqueue_script ( 'jquery' );
    wp_enqueue_script ( 'jquery-ui-dialog' );
    wp_enqueue_script ( 'media-upload' );
    wp_enqueue_script ( 'thickbox' );
    wp_enqueue_style ( 'thickbox' );
    wp_enqueue_script ( 'tinymce', mangocore_template_js . '/tinymce.js' );
    wp_enqueue_script ( 'admin_js', mangocore_template_js . '/admin.js' );
    wp_enqueue_style ( 'mango_hs_admin_css', mangocore_template_css . '/admin.css', false, mango_version, 'all' );
}
add_action ( 'admin_enqueue_scripts', 'mangocore_adminload_script' );

function mangocore_activate () {
    $mydir = get_template_directory () . "/vc_templates";
    if ( !is_dir ( $mydir ) ) {
        mkdir ( $mydir );
    }
    $files = glob ( mangocore_template_dir . "vc_templates/*.*" );
    foreach ( $files as $file ) {
        $fnm = pathinfo ( $file );
        copy ( $file, get_template_directory () . "/vc_templates/" . $fnm[ 'filename' ] . ".php" );
    }
}
register_activation_hook ( __FILE__, 'mangocore_activate' );

function mangocore_deactivate () {
    $arr = array ( 'vc_accordion', 'vc_accordion_tab', 'vc_button', 'vc_icon', 'vc_message', 'vc_progress_bar', 'vc_single_image', 'vc_tab', 'vc_tabs' );
    for ( $i = 0; $i < count ( $arr ); $i ++ )
	{
        $DelFilePath = get_template_directory () . "/vc_templates/" . $arr[ $i ] . ".php";
        if ( file_exists ( $DelFilePath ) ) {
            unlink ( $DelFilePath );
        }
    }
}
register_deactivation_hook ( __FILE__, 'mangocore_deactivate' );

require_once ( mangocore_template_dir . 'include/mango_post_types.php' );
require_once ( mangocore_template_dir . 'include/mango_cf7.php' );
require_once ( mangocore_template_dir . 'include/mango-shortcode.php' );
require_once ( mangocore_template_dir . 'include/mango_core_function.php' );
require_once ( mangocore_template_dir . 'tinymce/tinymce_shortcodebutton.php' );
require_once ( mangocore_template_dir . 'widgets/mango-widgets.php' ); 
 
if ( class_exists ( 'Vc_Manager' ) ) {
    require_once ( mangocore_template_dir . 'vc_extend/vc_extend.php' );
    require_once ( mangocore_template_dir . 'vc/vc-shortcodes.php' );
}

require_once ( mangocore_template_dir . 'vc/mango_custom_row.php' );
require_once ( mangocore_template_dir . 'shortcodes.php' );
?>