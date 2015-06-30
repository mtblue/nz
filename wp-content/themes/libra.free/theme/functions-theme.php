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
 * Theme setup file
 */

/**
 * Set up all theme data.
 * 
 * @return void
 * @since 1.0.0
 */
function yit_setup_theme() {    
    //Content width. WP require it. So give to WordPress what is of WordPress
    if( !isset( $content_width ) ) { $content_width = yit_get_option( 'container-width' ); }
    
    //This theme have a CSS file for the editor TinyMCE
    add_editor_style( 'css/editor-style.css' );
    
    //This theme support post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    //This theme uses the menues
    add_theme_support( 'menus' );
    
    //Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
    
    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yiw_header_image_width', 1170 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yiw_header_image_height', 410 ) );     
    
    // Don't support text inside the header image.
    if ( ! defined( 'NO_HEADER_TEXT' ) )
        define( 'NO_HEADER_TEXT', true );
    
    //This theme support custom header
    add_theme_support( 'custom-header' );
    
    //This theme support custom backgrounds
    add_theme_support( 'custom-backgrounds' );
    
    //This theme support post formats
    add_theme_support( 'post-formats', apply_filters( 'yit_post_formats_support', array( 'gallery', 'audio', 'video', 'quote' ) ) );
    
    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall.
    // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
    // set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );    
    $image_sizes = array(
        'blog_big'     => array( 890, 0, true ),        
        'section_blog' => array( 263, 243, true ),
        'section_services' => array( 175, 175, true ),
        'thumb-testimonial' => array( 41, 41, true ),
        'thumb-testimonial-circle' => array( 100, 100, true ),
        'thumb-testimonial-quote' => array( 87, 85, true ),
        'thumb-testimonial-square' => array( 116, 116, true ),
        'section_video' => array( 162, 136, true ),
        'team_rounded_thumb' => array( 130, 130, true ),
        'featured_project_thumb' => array( 320, 154, true ),
        'nav_menu' => array( 170, 0 ),
    );
    
    apply_filters( 'yit_add_image_size', $image_sizes );
    
    foreach ( $image_sizes as $id_size => $size )               
        add_image_size( $id_size, apply_filters( 'yit_' . $id_size . '_width', $size[0] ), apply_filters( 'yit_' . $id_size . '_height', $size[1] ), isset( $size[2] ) ? $size[2] : false );
    
    //Set localization and load language file
    $locale = get_locale();
    $locale_file = YIT_THEME_PATH . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
        require_once( $locale_file );
    
    //Register menus
    register_nav_menus(
        array(
            'nav' => __( 'Main navigation', 'yit' )
            //'top' => __( 'Top Bar', 'yit' )
        )
    );
    /*
	if ( !is_nav_menu( 'Top Menu' )) {
        $menu_id = wp_create_nav_menu( 'Top Menu' );
        $menu = array( 'menu-item-type' => 'custom', 'menu-item-url' => get_home_url('/'),'menu-item-title' => 'Home' );
        wp_update_nav_menu_item( $menu_id, 0, $menu );
		
		$locations = get_theme_mod('nav_menu_locations');
		$locations['top'] = $menu_id;  
		set_theme_mod('nav_menu_locations', $locations);
    }
    */
	function add_logout_button( $nav, $args )
	{
		if( is_user_logged_in() )
		{
			if( $args->theme_location == 'top' && get_option('woocommerce_menu_logout_link')!='yes' )
				return $nav.'<li><a href="' . wp_logout_url( home_url() ) . '"> ' . __('Logout', 'yit') . ' </a></li>';
			return $nav;
		}
		else
		{
			if( $args->theme_location == 'top' )
				if( is_shop_installed() )
				{
					$accountPage = get_permalink( get_option('woocommerce_myaccount_page_id') );
					return $nav.'<li><a href="' . $accountPage . '">' . __('Login', 'yit') . ' / ' . __('Register', 'yit') . '</a></li>';
				}
				else
					return $nav.'<li><a href="' . wp_login_url() . '">' . __('Login', 'yit') . '</a></li>'.wp_register(' / ','', false);
			return $nav;
		}
	}
	add_filter('wp_nav_menu_items','add_logout_button', 10, 2);
    
    //Register sidebars
    register_sidebar( yit_sidebar_args( 'Default Sidebar' ) );
    //register_sidebar( yit_sidebar_args( 'Header Sidebar', 'Widget area for Tob Bar', 'widget' ) );
    register_sidebar( yit_sidebar_args( 'Blog Sidebar' ) );
    register_sidebar( yit_sidebar_args( '404 Sidebar' ) );
    register_sidebar( yit_sidebar_args( 'Header Sidebar', 'Widget area for Navigation Bar', 'widget' ) );
    
    //User definded sidebars
    do_action( 'yit_register_sidebars' );
    
    //Register custom sidebars
    $sidebars = maybe_unserialize( yit_get_option( 'custom-sidebars' ) );
    if( is_array( $sidebars ) && ! empty( $sidebars ) ) {
        foreach( $sidebars as $sidebar ) {
            register_sidebar( yit_sidebar_args( $sidebar, '', 'widget', apply_filters( 'yit_custom_sidebar_title_wrap', 'h3' ) ) );
        }
    }
    
    //Footer with sidebar type widgets
    if( strstr( yit_get_option( 'footer-type' ), 'sidebar' ) ) {
        register_sidebar( yit_sidebar_args( "Footer Widgets Area", __( "The widget area used in Footer With Sidebar section", 'yit' ), 'widget span2', apply_filters( 'yit_footer_widget_area_wrap', 'h3' ) ) );
        register_sidebar( yit_sidebar_args( "Footer Sidebar", __( "The sidebar used in Footer With Sidebar section", 'yit' ), 'widget span6', apply_filters( 'yit_footer_widget_area_wrap', 'h3' ) ) );
    } else {
        //Footer sidebars
        for( $i = 1; $i <= yit_get_option( 'footer-rows', 0 ); $i++ ) {
            register_sidebar( yit_sidebar_args( "Footer Row $i", sprintf(  __( "The widget area #%d used in Footer section", 'yit' ), $i ), 'widget span' . ( 12 / yit_get_option( 'footer-columns' ) ), apply_filters( 'yit_footer_sidebar_' . $i . '_wrap', 'h3' ) ) );
        }
    }
}

wp_oembed_add_provider( '#https?://(?:api\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed', true );   

function yit_meta_like_body( $css ) {
    $body_bg = yit_get_option( 'background-style' );
    
    return $css . '.blog-big .meta, .blog-small .meta { background: ' . $body_bg['color'] . '; }';
}