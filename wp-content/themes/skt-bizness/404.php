<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SKT Bizness
 */

get_header(); ?>

<div class="content-area">
    <div class="container main_content_wrap">    
    <div class="page_wrapper">       
        <section class="site-main" id="sitefull">       
            <header class="page-header">
                <h1 class="title-404"><?php _e( '<strong>404</strong> Not Found', 'skt-bizness' ); ?></h1>
            </header><!-- .page-header -->           
                <p class="text-404"><?php _e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'skt-bizness' ); ?></p>
                <?php get_search_form(); ?>
                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                <?php if ( skt_bizness_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                    <div class="widget widget_categories">
                        <h3 class="widget_title"><?php _e( 'Most Used Categories', 'skt-bizness' ); ?></h3>
                        <ul>
                            <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                            ?>
                        </ul>
                    </div><!-- .widget -->
                <?php endif; ?>
                <?php
                $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'skt-bizness' ), convert_smilies( ':)' ) ) . '</p>';
                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                ?>
                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>           
        </section>
        <div class="clear"></div>
        </div><!--end .page_wrapper-->
    </div>
</div>

<?php get_footer(); ?>