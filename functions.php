<?php

include 'acf/acf-settings.php';

include 'helpers/job-helpers.php';
include 'helpers/profile-helpers.php';
include 'helpers/contractor-helpers.php';

//Setup Script and Stylesheet Queue
function vivo_queue() 
{
	//Styles
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'responsive' );
	wp_register_style( 'theme', get_stylesheet_directory_uri() . '/css/theme.css' );
	wp_enqueue_style( 'theme' );

	//Scripts
	wp_register_script( 'map-test', get_stylesheet_directory_uri() . '/js/map-test.js', array('jquery') );
	wp_enqueue_script( 'map-test' );
	wp_register_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array('jquery') );
	wp_enqueue_script( 'app' );
}
add_action( 'wp_enqueue_scripts', 'vivo_queue' );



//Setup All Menus
function register_menus() {
	register_nav_menu('right-header-menu',__( 'Right Header Menu' ));
}
add_action( 'init', 'register_menus' );

function create_jobs() {
	register_post_type('jobs', array(
		'labels' => array(
			'name' => __('Jobs'),
			'singular_name' => __('Job')
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'jobs'),
		'menu_icon' => 'dashicons-universal-access',
		'supports' => array('title','editor','thumbnail'),
		)
	);
}
add_action('init', 'create_jobs');

function job_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'job_excerpt_length', 999 );

function job_excerpt_end( $more ) {
	return '...';
}
add_filter('excerpt_more', 'job_excerpt_end');

?>