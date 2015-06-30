<?php
/**
 * Featured Post Slider
 *
 */

// Get our Featured Content posts
$slider_posts = courage_get_featured_content();

// Check if there is Featured Content
if ( empty( $slider_posts ) and current_user_can( 'edit_theme_options' ) ) : ?>

	<p class="post-slider-empty-posts">
		<?php _e('There is no featured content to be displayed in the slider. To set up the slider, go to Appearance -> Customize -> Theme Options, and add a tag under Tag Name in the Featured Content section. The slideshow will then display all posts which are tagged with that keyword.', 'courage'); ?>
	</p>
	
<?php
	return;
endif;

// Limit the number of words in slideshow post excerpts
add_filter('excerpt_length', 'courage_slideshow_excerpt_length');

// Display Slider
?>
	<div id="post-slider-container">
	
		<div id="post-slider-wrap" class="clearfix">
		
			<div id="post-slider" class="zeeflexslider">
				
				<ul class="zeeslides">

			<?php foreach ( $slider_posts as $post ) : setup_postdata( $post ); ?>
			
				<li id="slide-<?php the_ID(); ?>" class="zeeslide">

					<?php // Display Post Thumbnail or default thumbnail
					if ( has_post_thumbnail() ) : ?>
					
						<div class="slide-image">
							<?php the_post_thumbnail('courage-slider-image'); ?>
						</div>

					<?php else: ?>
						
						<div class="slide-image">
							<img src="<?php echo get_template_directory_uri(); ?>/images/default-slider-image.png" class="wp-post-image" alt="default-image" />
						</div>
						
					<?php endif;?>
					
					<div class="slide-content">
						
						<h2 class="slide-title">
							<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
						
						<div class="slide-entry">
							<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><span><?php the_excerpt(); ?></span></a>
						</div>
					
					</div>

				</li>

			<?php endforeach; ?>

				</ul>
				
			</div>
			
			<div class="post-slider-controls"></div>
			
		</div>
		
	</div>

<?php
// Remove excerpt filter
remove_filter('excerpt_length', 'courage_slideshow_excerpt_length');

// Reset Postdata
wp_reset_postdata();

?>