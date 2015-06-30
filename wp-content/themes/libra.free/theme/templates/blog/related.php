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

if( !is_single() || get_post_type() != 'post' || !yit_get_option( 'show-related-posts' ) )
    { return; }

$related_ids = yit_get_post_meta( get_the_ID(), '_related-posts' );
$title = yit_get_option( 'related-title' );
$description = yit_get_option( 'related-description' );
$items = yit_get_option( 'related-items' );
$orderby = yit_get_option( 'related-orderby' );
$order = yit_get_option( 'realted-order' );
$show_date = yit_get_option( 'related-show-date' );
$show_title = yit_get_option( 'related-show-title' );
$show_author = yit_get_option( 'related-show-author' );
$show_comments = yit_get_option( 'related-show-comments' );
$search_in = yit_get_option( 'related-search-in' );
$sidebar_layout = yit_get_sidebar_layout() ?>
<div class="row">
    <!-- START SECTION BLOG -->
    <div class="section blog span<?php echo $sidebar_layout == 'sidebar-no' ? 12 : 9 ?>">
        <?php
        //Separated code for a better organization of the code
        if( !empty( $title ) ) { yit_string( '<h2 class="title">', yit_decode_title( $title ), '</h2>' ); }
        if( !empty( $description ) ) { yit_string( '<p class="description">', $description, '</p>' ); }
        ?>
        
        <div class="row">
            <?php
            
            if( empty( $related_ids ) ) {
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => ( $items == 0 ? -1 : $items ),
                    'post__not_in' => array( get_the_ID() ),
                    'orderby' => $orderby,
                    'order' => $order 
                );
                
                $categories = $tags = '';
                
                if( $search_in == 'categories' || $search_in == 'both' )
                    { $categories = get_the_category(); }
                
                if( $search_in == 'tags' || $search_in == 'both' )
                    { $tags = get_the_tags(); }
                
                $args['tax_query'] = array(
                    'relation' => 'OR'
                );
                
                if( !empty( $categories ) ) {
                    $related_categories = array();
                    foreach( $categories as $category ) {
                        array_push( $related_categories, $category->slug );
                    }
                    
                    $args['tax_query'][] = array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $related_categories
                    );
                }
                
                if( !empty( $tags ) ) {
                    $related_tags = array();
                    foreach( $tags as $tag ) {
                        array_push( $related_tags, $tag->slug );
                    }
                    
                    $args['tax_query'][] = array(
                        'taxonomy' => 'post_tag',
                        'field' => 'slug',
                        'terms' => $related_tags
                    );
                }
            } else {
                $args = array(
                    'post_type' => 'post',
                    'post__not_in' => array( get_the_ID() ),
                    'post__in' => explode( ',', $related_ids ),
                    'orderby' => $orderby,
                    'order' => $order 
                );
            }
            
            $posts = new WP_Query( $args );
            if( $posts->have_posts() ) :
                while( $posts->have_posts() ) : $posts->the_post();
                    ?>
                    <div <?php post_class( 'hentry-post span3' ) ?>>
                        <div class="row">
                            <?php if( $show_date ) : ?>
                                <div class="date span1">
                                    <p><span class="month"><?php echo get_the_date( 'M' ) ?></span><span class="day"><?php echo get_the_date( 'd' ) ?></span></p>
                                </div>
                            <?php endif ?>
                            
                            <?php if( $show_title || $show_author || $show_comments ) : ?>
                                <div class="meta span2">
                                    <?php if( $show_title ) : ?>
                                        <?php the_title( '<h4><a href="' . get_permalink() . '" title="' . get_the_title() . '">', '</a></h4>' ) ?>
                                    <?php endif ?>
                                    
                                    <?php if( $show_author ) : ?>
                                        <p class="author"><?php printf( __( 'by <strong>%s</strong>', 'yit' ), get_the_author() ) ?></p>
                                    <?php endif ?>
                                    
                                    <?php if( $show_comments ) : ?>
                                        <p class="comments"><?php comments_popup_link( __( '<strong>Comments:</strong> 0', 'yit' ), __( '<strong>Comments:</strong> 1', 'yit' ), __( '<strong>Comments:</strong> %', 'yit' ) ); ?></p>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
        <?php wp_reset_query() ?>
    </div>
</div>