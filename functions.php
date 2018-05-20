<?php

function theme_styles() {
	
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

function theme_js() {
	
	global $wp_scripts;
	
	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=>	__( 'Header Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );

function create_widget($name, $id, $description) {
	
	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'before_widget' => '<div class="widget panel panel-primary">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="panel-heading panel-title">',
		'after_title' => '</h3>'
	));
	
}
create_widget( 'Drinks Sidebar', 'drinks', 'Displays on the side of the drinks page with a sidebar' );

// Exciting stuff to make the custom post types work!
function add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
$post_types = get_post_types();

$query->set( 'post_type', $post_types );
return $query;
}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

?>