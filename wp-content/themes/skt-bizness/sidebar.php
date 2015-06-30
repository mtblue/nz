<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SKT Bizness
 */
?>
<div class="sidebar-right"> 

	<?php if(!dynamic_sidebar('sidebar-main')) : ?>
    <aside class="sidebar-area">
        <h3 class="widget_title"><?php _e('Blog','skt-bizness'); ?></h3>
        <?php $query_var = new wp_query('post_type=post'); ?>
        	<?php while( $query_var->have_posts() ) : $query_var->the_post(); ?>
                    <div class="sidebar-blog-posts"> 
                                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                	<?php the_excerpt(); ?>
                    </div>
           	<?php endwhile; ?>
            <?php wp_reset_query(); ?>
    </aside>
    <?php endif; ?>
    
</div><!-- sidebar-right --> 