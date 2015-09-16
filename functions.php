<?php

//Setup Script and Stylesheet Queue
function vivo_queue() 
{
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'theme', get_stylesheet_directory_uri() . '/css/theme.css' );
	wp_enqueue_style( 'theme' );
}
add_action( 'wp_enqueue_scripts', 'vivo_queue' );



//Setup All Menus
function register_menus() {
	register_nav_menu('right-header-menu',__( 'Right Header Menu' ));
}
add_action( 'init', 'register_menus' );

?>