<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function courage_theme_options() {
    
	// Merge Theme Options Array from Database with Default Options Array
	$theme_options = wp_parse_args( 
		
		// Get saved theme options from WP database
		get_option( 'courage_theme_options', array() ), 
		
		// Merge with Default Options if setting was not saved yet
		courage_default_options() 
		
	);

	// Return theme options
	return $theme_options;
	
}


// Build default options array
function courage_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'header_tagline' 					=> false,
		'header_search' 					=> false,
		'header_icons' 						=> false,
		'posts_length' 						=> 'index',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'excerpt_text' 						=> false,
		'slider_active_magazine' 			=> false,
		'slider_active_blog' 				=> false,
		'slider_animation' 					=> 'horizontal'
	);
	
	return $default_options;
}


?>