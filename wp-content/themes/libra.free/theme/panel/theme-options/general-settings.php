<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Add more items to the menu in the Theme Options panel
 * 
 * @param array $items
 * @return array
 */
function yit_item_menu_theme_options( $items ) {
    return array_merge( $items, array( 
        'panel_import' => __( 'Panel Import', 'yit' ),
        'custom_style' => __( 'Custom style', 'yit' ),
        'custom_script' => __( 'Custom script', 'yit' ),
    ) );
}
//add_filter( 'yit_admin_menu_theme_options', 'yit_item_menu_theme_options' );

function yit_item_submenu_theme_options( $items ) {
    return array_merge( $items, array( 
        'testimonials' => array(
            'settings' => __( 'Settings', 'yit' ),
            'typography' => __( 'Typography', 'yit' ),
            'colors' => __( 'Colors', 'yit' )
        )
    ) );
}
//add_filter( 'yit_admin_submenu_theme_options', 'yit_item_submenu_theme_options' );

/**
 * Add specific fields to the tab General -> Settings
 * 
 * @param array $fields
 * @return array
 */ 
function yit_tab_general_settings( $fields ) {
	
	$fields[57] = array(
        'id'   => 'show-login',
        'type' => 'onoff',
        'name' => __( 'Show login', 'yit' ),
        'desc' => __( 'Say if you want the login in header.', 'yit' ),
        'std'  => apply_filters( 'yit_show-login_std', true )
    );
	
	$fields[62] = array(
        'id'   => 'breadcrumb-text',
        'type' => 'text',
        'name' => __( 'Text before breadcrumb', 'yit' ),
        'desc' => __( 'Text will be show before the breadcrumbs (empty if you don\'t want it).', 'yit' ),
        'deps' => array(
			'ids' => 'breadcrumb',
			'values' => 1
		),
        'std'  => apply_filters( 'yit_breadcrumb-text_std', __('You are here:', 'yit') )
    );
    
    return $fields;
}
add_filter( 'yit_submenu_tabs_theme_option_general_settings', 'yit_tab_general_settings' ); 

add_filter( 'yit_background-style_std', create_function( '', "return array( 'image' => 'custom', 'color' => '#ffffff' );" ) );
add_filter( 'yit_bg_image_std', create_function( '', "return '" . get_template_directory_uri() . "/images/bg-pattern.png';" ) );