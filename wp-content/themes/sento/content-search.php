<?php
/**
 * The template for displaying content on the search results page.
 *
 * @package Sento
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

						<?php thinkup_input_blogtitle(); ?>

						<div class="entry-content">
							<?php the_excerpt(); ?>

							<div class="entry-meta">
								<?php thinkup_input_blogauthor(); ?>
								<?php thinkup_input_blogdate(); ?>
								<?php thinkup_input_blogcomment(); ?>
								<?php thinkup_input_blogcategory(); ?>
								<?php thinkup_input_blogtag(); ?>
							</div>
						</div>

					<div class="clearboth"></div>
					</article><!-- #post-<?php get_the_ID(); ?> -->	