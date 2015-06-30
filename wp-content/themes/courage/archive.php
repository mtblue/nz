<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = courage_theme_options();
?>

	<div id="wrap" class="clearfix">
		
		<section id="content" class="primary" role="main">

		<h2 id="date-title" class="archive-title">
			<?php // Display Archive Title
			if ( is_date() ) :
				printf( __( 'Monthly Archives: %s', 'courage' ), '<span>' . get_the_date( _x( 'F Y', 'date format of monthly archives', 'courage' ) ) . '</span>' );
			else :
				_e( 'Archives', 'courage' );
			endif;
			?>
		</h2>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', $theme_options['posts_length'] );
		
			endwhile;
			
		courage_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	