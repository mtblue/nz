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

$args = array(
    'post_type' => 'services',
    'posts_per_page' => $items,
);

$services = new WP_Query( $args );
$sidebar_layout = yit_get_sidebar_layout();
$postsPerRow = (yit_get_sidebar_layout() != 'sidebar-no') ? 3 : 6;
$i = 0;
if( $services->have_posts() ) :
    global $wp_query, $post, $more;
	?>
		<div class="section <?php echo $services_style; if($services_style == "rounded") echo " ch-grid" ?> margin-top margin-bottom">
			<?php if( !empty( $title ) ) { yit_string( '<h3 class="title">', yit_decode_title($title), '</h3>' ); } ?>
	    	<?php if( !empty( $description ) ) { yit_string( '<p class="description">', $description, '</p>' ); } ?>
			<div class="services-row row group">
				<?php while( $services->have_posts() ) : $services->the_post() ?>					
					
						<div class="span3 <?php if( ( $i++ % $postsPerRow == 0 ) ): ?>service-first<?php endif ?>">
					  		<?php
					  			$details = ($show_detail_hover == 'yes' || $show_detail_hover == '1');
								$title = ($show_title_hover == 'yes' || $show_title_hover == '1');
					  		?>
						  	<div class="<?php if ( !$details && !$title ) : ?>picture_overlay_empty <?php endif ?>picture_overlay">
						  		<a href="<?php the_permalink() ?>"><?php echo has_post_thumbnail() ? get_the_post_thumbnail( get_the_ID(), 'section_services' ) : '<img src="' . YIT_CORE_ASSETS_URL . '/images/no-featured-175.jpg" title="' . __( '(this post does not have a featured image)', 'yit' ) . '" alt="no featured image" />' ?></a>
						  		<?php if ( $details || $title ) : ?>   
						  		<div class="overlay">
						  			<div>
						  				<?php if( $details ): ?>
						  				<p>
											<?php if( $details ): ?><a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri() . '/images/icons/project.png' ?>" alt="" /></a><?php endif ?>
										</p>
						  				<?php endif ?>
										<?php if( $title ): ?> 
											<p class="title"><a href="<?php the_permalink() ?>"><?php echo yit_decode_title(get_the_title()) ?></a></p>
										<?php endif ?>
						  			</div>
						  		</div>
						  		<?php endif ?>
						    </div>
					
					<?php if( $show_title == "1" || $show_title == 'yes' ): ?><h4><a href="<?php the_permalink() ?>"><?php echo yit_decode_title(get_the_title()); ?></a></h4><?php endif ?>
					<?php if( $show_excerpt == "1" || $show_excerpt == 'yes' ): ?><?php echo yit_content( 'content', $excerpt_length ) ?><?php endif ?>
				</div>
				<?php endwhile ?>
			</div><!-- end row -->
		</div>
    <?php
endif;

wp_reset_query();