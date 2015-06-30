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

function yit_tab_blog_settings( $items ) {
    unset( $items[66] );
    
    $items[90] = array(
        'id'   => 'blog-post-formats-list',
        'type' => 'onoff',
        'name' => __( 'Show post formats on posts list', 'yit' ),
        'desc' => __( 'Select if you want to show the post formats also in the posts list and not only in the post detail page.', 'yit' ),
        'deps' => array(
            'ids' => 'blog-type',
            'values' => 'big,libra-big,elegant'
        ),
        'std'  => apply_filters( 'yit_blog-post-formats-list_std', 0 )
    );
    
    $items[100] = array(
        'id' => 'show-related-posts',
        'type' => 'onoff',
        'name' => __( 'Show related posts', 'yit' ),
        'desc' => __( 'Select if you want to show related posts below the post detail page.', 'yit' ),
        'std' => apply_filters( 'yit_show-related-posts_std', 1 )
    );
    
    $items[110] = array(
        'id' => 'related-title',
        'type' => 'text',
        'name' => __( 'Related posts section title', 'yit' ),
        'desc' => __( 'Type in the title of the section.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-title_std', __( 'Related posts', 'yit' ) )
    );
    
    $items[120] = array(
        'id' => 'related-description',
        'type' => 'text',
        'name' => __( 'Related posts section description', 'yit' ),
        'desc' => __( 'Type in the description of the section.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-description_std', '' )
    );
    
    $items[130] = array(
        'id' => 'related-items',
        'type' => 'number',
        'min' => 0,
        'max' => 24,
        'name' => __( 'Related posts items', 'yit' ),
        'desc' => __( 'Select the number of posts to show in the related posts section. Set 0 to show all.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-items_std', 4 )
    );
    
    $items[140] = array(
        'id' => 'related-orderby',
        'type' => 'select',
        'options' => apply_filters( 'yit_related-orderby_options', array(
            'rand' => __( 'Random', 'yit' ),
            'id' => __( 'ID', 'yit' ),
            'date' => __( 'Date', 'yit' ),
            'author' => __( 'Author', 'yit' ),
            'title' => __( 'Title', 'yit' ),
            'name' => __( 'Slug', 'yit' ),
            'modified' => __( 'Last modified date', 'yit' ),
            'comment_count' => __( 'Comments', 'yit' )
        ) ),
        'name' => __( 'Related posts order by', 'yit' ),
        'desc' => __( 'Select the order to use to show related posts.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-orderby_std', 'rand' )
    );
    
    $items[150] = array(
        'id' => 'related-order',
        'type' => 'select',
        'options' => apply_filters( 'yit_related-order_options', array(
            'asc' => __( 'Ascending', 'yit' ),
            'desc' => __( 'Descending', 'yit' )
        ) ),
        'name' => __( 'Related posts order', 'yit' ),
        'desc' => __( 'Select the order to use to show related posts.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-order_std', 'asc' )
    );
    
    $items[160] = array(
        'id' => 'related-search-in',
        'type' => 'select',
        'options' => apply_filters( 'yit_related-search-in_options', array(
            'categories' => __( 'Categories', 'yit' ),
            'tags' => __( 'Tags', 'yit' ),
            'both' => __( 'Categories and tags', 'yit' )
        ) ),
        'name' => __( 'Search related posts in', 'yit' ),
        'desc' => __( 'Select which taxonomy to use for related posts.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-search-in_std', 'categories' )
    );
    
    $items[170] = array(
        'id' => 'related-show-date',
        'type' => 'onoff',
        'name' => __( 'Show related posts date', 'yit' ),
        'desc' => __( 'Select if you want to show related posts date.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-show-date_std', 1 )
    );
    
    $items[180] = array(
        'id' => 'related-show-title',
        'type' => 'onoff',
        'name' => __( 'Show related posts title', 'yit' ),
        'desc' => __( 'Select if you want to show related posts title.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-show-title_std', 1 )
    );
    
    $items[190] = array(
        'id' => 'related-show-author',
        'type' => 'onoff',
        'name' => __( 'Show related posts author', 'yit' ),
        'desc' => __( 'Select if you want to show related posts author.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-show-author_std', 1 )
    );
    
    $items[200] = array(
        'id' => 'related-show-comments',
        'type' => 'onoff',
        'name' => __( 'Show related posts comments number', 'yit' ),
        'desc' => __( 'Select if you want to show related posts comments number.', 'yit' ),
        'deps' => array(
            'ids' => 'show-related-posts',
            'values' => '1'
        ),
        'std' => apply_filters( 'yit_related-show-date_std', 1 )
    );
    
    return $items;
}
add_filter( 'yit_submenu_tabs_theme_option_blog_settings', 'yit_tab_blog_settings' );

function yit_blog_icons_deps() {
    return array(
        'ids' => 'blog-type',
        'values' => 'big,small,elegant,pinterest'
    );
}
add_filter( 'yit_blog-date-icon_deps', 'yit_blog_icons_deps' );
add_filter( 'yit_blog-author-icon_deps', 'yit_blog_icons_deps' );

function yit_blog_categories_deps() {
    return array(
        'ids' => 'blog-type',
        'values' => 'libra-big,libra-small'
    );
}
add_filter( 'yit_blog-show-categories_deps', 'yit_blog_categories_deps' );

add_filter( 'yit_blog-read-more-text_std', create_function( '', 'return "Read more";' ) );

function yit_blog_date_icon_std() {
    return array( 'icon' => 'icon-calendar', 'custom' => YIT_THEME_IMG_URL . '/icons/date.png' );
}
add_filter( 'yit_blog-date-icon_std', 'yit_blog_date_icon_std' );

function yit_blog_author_icon_std() {
    return array( 'icon' => 'icon-user', 'custom' => YIT_THEME_IMG_URL . '/icons/author.png' );
}
add_filter( 'yit_blog-author-icon_std', 'yit_blog_author_icon_std' );

function yit_blog_comments_icon_std() {
    return array( 'icon' => 'icon-comment', 'custom' => YIT_THEME_IMG_URL . '/icons/comments.png' );
}
add_filter( 'yit_blog-comments-icon_std', 'yit_blog_comments_icon_std' );

add_filter( 'yit_blog-type_std', create_function( '', 'return "libra-big";' ) );