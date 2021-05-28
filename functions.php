<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
//jQuery
function shapeSpace_include_custom_jquery() {

  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
//Image Sizes
if (!function_exists('theme_setup')) :
	function theme_setup()
	{
		/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
    add_theme_support('post-thumbnails');
    add_image_size('large-rectangle', 500, 350, true);
    add_image_size('rectangle', 370, 200, array('left', 'bottom'));
    add_image_size('logo', 80, 100, true);
	}
endif;
add_action('after_setup_theme', 'theme_setup');

//Google Fonts
function google_fonts()
{
	$query_args = array(
		'family' => 'Raleway:400,700',
		'subset' => 'latin,latin-ext'
  );
	wp_enqueue_style('google_fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"), array(), null);
}
add_action('wp_enqueue_scripts', 'google_fonts');

function fontawesome() {
  wp_enqueue_script(
    'font-awesome', //handle
    'https://kit.fontawesome.com/6b46070716.js',
    array(), //dependencies
    '5.10.2', // version number
    true //load in footer
  );
  }
  add_action('wp_enqueue_scripts', 'fontawesome');
  
//Add footer widgets
function register_widget_areas() {

  register_sidebar( array(
    'name'          => 'Footer area one',
    'id'            => 'footer_area_one',
    'description'   => 'This widget area description',
    'before_widget' => '<section class="footer-area footer-area-one">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ));

  register_sidebar( array(
    'name'          => 'Footer area two',
    'id'            => 'footer_area_two',
    'description'   => 'This widget area description',
    'before_widget' => '<section class="footer-area footer-area-two">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ));

  register_sidebar( array(
    'name'          => 'Footer area three',
    'id'            => 'footer_area_three',
    'description'   => 'This widget area description',
    'before_widget' => '<section class="footer-area footer-area-three">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ));

  register_sidebar( array(
    'name'          => 'Footer area four',
    'id'            => 'footer_area_four',
    'description'   => 'This widget area description',
    'before_widget' => '<section class="footer-area footer-area-four">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Footer area five',
    'id'            => 'footer_area_five',
    'description'   => 'This widget area description',
    'before_widget' => '<section class="footer-area footer-area-five">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ));
register_sidebar( array(
  'name'          => 'Search Area',
  'id'            => 'search_area',
  'role'    =>'search',
  'description'   => 'Search box area for image pages',
  'before_widget' => '<section class="search-area">',
  'after_widget'  => '</section>',
  'before_title'  => '<h2>',
  'after_title'   => '</h2>',
));

register_sidebar( array( 
  'name' => '404 Page', 
  'id' => '404',
  'description'  => __( 'Content for your 404 error page goes here.' ),
  'before_widget' => '<div id="error-box">', 
  'after_widget' => '</div>', 
  'before_title' => '<h4 class="widget-title">', 
  'after_title' => '</h4>'
) );
}
add_action( 'widgets_init', 'register_widget_areas' );

register_sidebar( array(
  'name'          => 'Search Area',
  'id'            => 'search_area',
  'role'    =>'search',
  'description'   => 'Search box area for image pages',
  'before_widget' => '<section class="search-area">',
  'after_widget'  => '</section>',
  'before_title'  => '<h2>',
  'after_title'   => '</h2>',
));
//Add categories to pages
function myplugin_settings() {  
  // Add category metabox to page
  register_taxonomy_for_object_type('category', 'page');  
}
// Add to the admin_init hook of your theme functions.php file 
add_action( 'init', 'myplugin_settings' );

//Read More Buttons
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' ); 
  
 if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) { 
 	/** 
 	 * Adds a custom read more link to all excerpts, manually or automatically generated 
 	 * 
 	 * @param string $post_excerpt Posts's excerpt. 
 	 * 
 	 * @return string 
 	 */ 
 	function understrap_all_excerpts_get_more_link( $post_excerpt ) { 
 		if ( ! is_admin() ) { 
 			$post_excerpt = $post_excerpt ; 
 		} 
 		return $post_excerpt; 
 	} 
 } 
//Disable comments
function filter_media_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
      return false;
  }
  return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

//Add redirect filter
add_filter('redirect_canonical','pif_disable_redirect_canonical');

function pif_disable_redirect_canonical($redirect_url) {
    if (is_singular()) $redirect_url = false;
return $redirect_url;
}

//Breadcrumbs
function the_breadcrumb() {
  global $post;
  echo '<nav role="navigation" aria-label="breadcrumbs"> <ol id="breadcrumbs">';
  if (!is_home()) {
      echo '<li><a href="';
      echo get_option('home');
      echo '">';
      echo 'Home';
      echo '</a></li><li class="separator"> <i class="fas fa-chevron-right fa-xs"></i> </li>';
    
       if (is_page()) {
          if($post->post_parent){
              $anc = get_post_ancestors( $post->ID );
              $title = get_the_title();
              foreach ( $anc as $ancestor ) {
                  $output = '<li><a aria-current="page" href="'.get_permalink($ancestor).'"'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator"> <i class="fas fa-chevron-right fa-xs"></i></li>';
              }
              echo $output;
              echo '<li aria-current="page"> '.$title.'</li></ol></nav>';
          } else {
              echo '<li aria-current="page"> '.get_the_title().'</li></ol></nav>';
          }
      }
  }
}