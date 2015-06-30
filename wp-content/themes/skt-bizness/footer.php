<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Bizness
 */
?>
<div class="clear"></div>         
</div><!--end .main-wrapper-->
</div><!--end .main-page-area-->
<div id="services-area"> 
   <div class="container services_wrap">
      <div class="page_wrapper">           
         <?php for($f=1; $f<6; $f++) { ?>
         <?php if(get_theme_mod('page-setting'.$f) != '') { ?>
         <?php $page_query = new WP_Query('page_id='.get_theme_mod('page-setting'.$f)); ?>
         <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
         		<div class="list-services <?php if( $f%5==0){?>last-cols<?php } ?>">
                <?php 	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
						$url = $thumb['0'];
				?>
                <a href="#"><img src="<?php if(has_post_thumbnail()) { echo $url; } else { echo esc_url(get_template_directory_uri().'/images/thumb_01.jpg'); } ?>" alt="" />
                <h6><?php the_title(); ?></h6></a>   
                <p><?php the_excerpt(); ?></p>
                <a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More','skt-bizness'); ?></a> 
             </div><?php if( $f%5==0) { ?><div class="clear"></div><?php } ?> 
         <?php endwhile; ?>
         <?php } else { ?>
             <div class="list-services <?php if( $f%5==0){?>last-cols<?php } ?>">
                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/thumb_01.jpg" alt="" />
                <h6><?php _e('Page Title','skt-bizness'); ?> <?php echo $f; ?> </h6></a>   
                <p><?php _e('Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque pena tibus et magnis dis parturient modayn test.','skt-bizness'); ?></p>
                <a class="readmore" href="#"><?php _e('Read More','skt-bizness'); ?></a> 
             </div><?php if( $f%5==0) { ?><div class="clear"></div><?php } ?>         
   		 <?php  } } ?>
          
          </div><!--end .page_wrapper-->       
     </div> <!--end container-->
   </div><!--end services area-->
   
   <?php if( is_home() && !get_option('page_on_front')) { ?>
   		<section>	
        	<div class="home-post">
            	<div>
                   <header class="entry-header">
                         <h2 class="entry-title"><?php _e('From the Blog','skt-bizness'); ?></h2>
                   </header><!-- .entry-header -->		
                    <div class="blog-post">
                        <?php 
                        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                        elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                        else { $paged = 1; }
                        $query = new WP_Query( array( 'paged' => $paged ) ); ?>
                        <?php if( $query->have_posts() ) : ?>
                            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                                <?php get_template_part( 'content', get_post_format() ); ?>
                            <?php endwhile; ?>
                            <?php skt_bizness_custom_blogpost_pagination( $query ); ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <?php get_template_part( 'no-results', 'index' ); ?>
                        <?php endif; ?>
                    </div><!-- blog-post -->
            	</div>
            </div><!-- home-post -->
        </section><div class="clear"></div>
   <?php } ?> 

<footer id="footer">
	<div class="container">
		<div class="left">
               <?php wp_nav_menu( array('theme_location'  => 'footer') ); ?>      
        </div>
    	<div class="right">
		  <p><?php echo get_theme_mod('footer_copy','Bizness &copy; 2015 | All Rights Reserved'); ?><br />
		  <?php echo skt_bizness_credit_link(); ?></p>
        </div>
        <div class="clear"></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>