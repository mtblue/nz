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
 
global $post;
 
// use static header image
if ( isset( $post->ID ) && get_post_meta( $post->ID, '_use_static_image', true ) ) {  ?>
    <div class="slider fixed-image inner">
        <img src="<?php echo get_post_meta( $post->ID, '_static_image', true ) ?>" alt="<?php bloginfo('name') ?> Header" />
    </div><?php   
		
// use static header of Appearance -> Header
} elseif ( get_header_image() != '' ) {       
?>
	    <div class="slider fixed-image inner">
        	<img src="<?php header_image() ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name') ?> Header" />
        </div>
	<?php
    
}