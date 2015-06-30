<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SKT Bizness
 */

get_header(); ?>
<div class="content-area">
    <div class="container main_content_wrap">
      <div class="page_wrapper">  
            
        <section id="site-main" class="site-main content-part" >        
            <div class="blog-post">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <?php skt_bizness_content_nav( 'nav-below' ); ?>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>
            </div>        
        </section>
        <?php get_sidebar('blog');?>
        <div class="clear"></div>
        </div><!--end .page_wrapper-->
    </div>
</div>
	
<?php get_footer(); ?>