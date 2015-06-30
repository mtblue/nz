<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'courage_enqueue_scripts');

if ( ! function_exists( 'courage_enqueue_scripts' ) ):
function courage_enqueue_scripts() {

	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style('courage-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('courage-genericons', get_template_directory_uri() . '/css/genericons/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('courage-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
		
	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( ( isset($theme_options['slider_active_blog']) and $theme_options['slider_active_blog'] == true )
		|| ( isset($theme_options['slider_active_magazine']) and $theme_options['slider_active_magazine'] == true ) ) :

		// FlexSlider CSS
		wp_enqueue_style('courage-flexslider', get_template_directory_uri() . '/css/flexslider.css');

		// FlexSlider JS
		wp_enqueue_script('courage-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'));

		// Register and enqueue slider.js
		wp_enqueue_script('courage-post-slider', get_template_directory_uri() .'/js/slider.js', array('courage-flexslider'));

	endif;

	// Register and Enqueue Fonts
	wp_enqueue_style('courage-default-fonts', courage_google_fonts_url(), array(), null );

}
endif;

// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'courage_enqueue_comment_reply' );

function courage_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Retrieve Font URL to register default Google Fonts
function courage_google_fonts_url() {
    
	$font_families = array('Lato', 'Fjalla One');

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return apply_filters( 'courage_google_fonts_url', $fonts_url );
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'courage_setup' );

if ( ! function_exists( 'courage_setup' ) ):
function courage_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 860;
	
	// init Localization
	load_theme_textdomain('courage', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_editor_style();
	
	// Add Post Thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 840, 200, true );

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'e5e5e5'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1340,
		'height' => 200,
		'flex-height' => true));
	
	// Add Theme Support for Courage Pro Plugin
	add_theme_support( 'courage-pro' );

	// Register Navigation Menus
	register_nav_menu( 'primary', __('Main Navigation', 'courage') );
	register_nav_menu( 'footer', __('Footer Navigation', 'courage') );
	
	// Register Social Icons Menu
	register_nav_menu( 'social', __('Social Icons', 'courage') );

}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'courage_add_image_sizes' );

if ( ! function_exists( 'courage_add_image_sizes' ) ):
function courage_add_image_sizes() {
	
	// Add Custom Header Image Size
	add_image_size( 'courage-header-image', 1320, 250, true);
	
	// Add Slider Image Size
	add_image_size('courage-slider-image', 1320, 380, true);
	
	// Add Category Post Widget image sizes
	add_image_size('courage-category-posts-widget-small', 80, 80, true);
	add_image_size('courage-category-posts-widget-big', 540, 180, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'courage_register_sidebars' );

if ( ! function_exists( 'courage_register_sidebars' ) ):
function courage_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Sidebar', 'courage' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except front page and fullwidth template.', 'courage' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar( array(
		'name' => __( 'Magazine Homepage', 'courage' ),
		'id' => 'magazine-homepage',
		'description' => __( 'Appears on Magazine Homepage template only. You can use the Category Posts widgets here.', 'courage' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

}
endif;


// Add title tag for older WordPress versions
if ( ! function_exists( '_wp_render_title_tag' ) ) :

	add_action( 'wp_head', 'courage_wp_title' );
	function courage_wp_title() { ?>
		
		<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php
    }
    
endif;


// Add Default Menu Fallback Function
function courage_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function courage_get_featured_content() {
	return apply_filters( 'courage_get_featured_content', false );
}


// Change Excerpt Length
add_filter('excerpt_length', 'courage_excerpt_length');
function courage_excerpt_length($length) {
    return 60;
}


// Slideshow Excerpt Length
function courage_slideshow_excerpt_length($length) {
    return 32;
}

// Frontpage Category Excerpt Length
function courage_frontpage_category_excerpt_length($length) {
    return 20;
}


// Change Excerpt More
add_filter('excerpt_more', 'courage_excerpt_more');
function courage_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = courage_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'courage_list_comments' ) ):
function courage_list_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'courage' ); ?> <?php comment_author_link(); ?>
			<?php edit_comment_link( __( '(Edit)', 'courage' ), '<span class="edit-link">', '</span>' ); ?>
			</p>

	<?php else : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 56 ); ?>
					<?php printf(__('<span class="fn">%s</span>', 'courage'), get_comment_author_link()) ?>
				</div>

		<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'courage' ); ?></p>
		<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'courage'), get_comment_date(),  get_comment_time()) ?></a>
					<?php edit_comment_link(__('(Edit)', 'courage'),'  ','') ?>
				</div>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

			</div>
<?php
	endif;

}
endif;


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );
require( get_template_directory() . '/inc/customizer/frontend/custom-slider.php' );

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-category-posts-boxed.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-columns.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-grid.php' );

// Include Featured Content class
require( get_template_directory() . '/inc/featured-content.php' );


?>