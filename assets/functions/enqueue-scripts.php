<?php
function site_scripts() {
global $wp_styles;
  //wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '', true );
  wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/vendor/foundation-sites/dist//js/foundation.min.js', array( 'jquery' ), '6.2.3', true );
  wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
  wp_enqueue_style( 'motion-ui-css', get_template_directory_uri() . '/vendor/motion-ui/dist/motion-ui.min.css', array(), '', 'all' );
  wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation-sites/dist/css/foundation.min.css', array(), '', 'all' );
  wp_deregister_script( 'wp-embed' );
}
add_action('wp_enqueue_scripts', 'site_scripts', 997);


//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

function slick_scripts() {
  wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', array( 'jquery' ), '', true );
  wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css');
  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
}

add_action('wp_enqueue_scripts', 'slick_scripts', 999);

function my_custom_admin() {
wp_enqueue_style('admin_styles' , get_template_directory_uri().'/assets/css/my_admin.css');
}

add_action('admin_head', 'my_custom_admin');