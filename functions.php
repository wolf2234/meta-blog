<?php 
add_action('wp_enqueue_scripts', 'meta_blog_styles');
add_action('wp_enqueue_scripts', 'meta_blog_scripts');
add_action('after_setup_theme', 'meta_blog_nav_menu');


function meta_blog_nav_menu() {
    register_nav_menu( 'top', 'menu in header' );
}


function meta_blog_styles() {
    wp_enqueue_style('null-style', get_template_directory_uri() . '/assets/css/null-style.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main-style.css');
    // wp_enqueue_style('main-style', get_template_directory_uri() . 'assets/css/main-style.css');
}

function meta_blog_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js");
    wp_enqueue_script( 'jquery' );
    /*
    wp_enqueue_script
    true: this script will be in footer.  
    array('jquery'): this script will add after jquery.
    */
	wp_enqueue_script( 'slick', get_template_directory_uri() . 'assets/js/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script( 'jq-script', get_template_directory_uri() . 'assets/js/jq-script.js', array('jquery'), null, true);
	wp_enqueue_script( 'scripts', get_template_directory_uri() . 'assets/js/scripts.js', array('jquery'), null, true);
} 


add_theme_support('custom-logo');
add_theme_support('post-thumbnails');