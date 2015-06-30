<?php 
/***
 * Custom Javascript Options
 *
 * Passing Variables from custom Theme Options to the javascript files
 * of theme navigation and frontpage slider. 
 *
 */

// Passing Variables to Featured Post Slider Slider ( js/slider.js)
add_action('wp_enqueue_scripts', 'courage_custom_slider_params');

if ( ! function_exists( 'courage_custom_slider_params' ) ):

function courage_custom_slider_params() { 
	
	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	if( isset($theme_options['slider_animation']) ) :
		$params['animation'] = esc_attr($theme_options['slider_animation']);
	endif;
	
	// Passing Parameters to Javascript
	wp_localize_script( 'courage-post-slider', 'courage_slider_params', $params );
	
	
	// Set Navigation Menu Title
	$nav_title = __('Menu', 'courage');
	
	// Passing Parameters to Javascript
	wp_localize_script( 'courage-jquery-navigation', 'courage_mainnav_title', $nav_title );
	
}

endif;


?>