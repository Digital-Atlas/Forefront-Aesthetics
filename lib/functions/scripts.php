<?php

// Load Scripts
add_action( 'wp_enqueue_scripts', 'load_scripts' );
function load_scripts() {

		// load foundation
		//wp_enqueue_script( 'foundation', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.js', array('jquery'), TRUE );

		wp_enqueue_script( 'wp-util' );
						
		// Child Theme JS
		wp_enqueue_script( THEME_NAME , THEME_JS . '/project.js', 
				array(
					'jquery', 
					'wp-util'
					), 
				NULL, TRUE );
}