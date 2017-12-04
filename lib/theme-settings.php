<?php
 
  
/****************************************
	Enqueue theme stylesheet
	*****************************************/
 
add_action( 'wp_enqueue_scripts', 'kr_enqueue_stylesheet', 15 );
function kr_enqueue_stylesheet() {

	$version = defined( 'THEME_VERSION' ) && THEME_VERSION ? THEME_VERSION : '1.11';
	$handle  = defined( 'THEME_NAME' ) && THEME_NAME ? sanitize_title_with_dashes( THEME_NAME ) : 'theme';

	wp_enqueue_style( $handle, trailingslashit( THEME_URL ) . 'style.min.css', false, $version,'screen' );

}
 
/****************************************
	Image Sizes
	*****************************************/
	
//add_image_size( 'lightbox', 1200, 1200 ); 
//add_image_size( 'banner', 1500, 1500 );
//add_image_size( 'event-thumbnail', 450, 286, array( 'center', 'top' ) ); 
//add_image_size( 'homepage-link-thumbnail', 640, 540, array( 'center', 'top' ) ); 
//add_image_size( 'media-thumbnail', 600, 500 ); 
