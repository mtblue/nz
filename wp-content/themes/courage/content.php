		
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-full'); ?>>
		
		<?php courage_display_thumbnail_index(); ?>
		
		<h2 class="post-title entry-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<div class="postmeta"><?php courage_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php the_content(__('Read more', 'courage')); ?>
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div>
		
		<div class="postinfo clearfix"><?php courage_display_postinfo(); ?></div>

	</article>