<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Bizness
 */

get_header(); ?>

<div class="content-area">
    <div class="container main_content_wrap">     
   <div class="page_wrapper"> 
           	       
       <section id="site-main" class="site-main content-part" >       
			<?php if ( have_posts() ) : ?>               
				<div class="blog-post">
					<?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php skt_bizness_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
          
        </section>      
	     <?php get_sidebar('blog');?>      
        <div class="clear"></div>
        </div><!--end .page_wrapper-->
    </div>
</div>
	
<?php get_footer(); ?>