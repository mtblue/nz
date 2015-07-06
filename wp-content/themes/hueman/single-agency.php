<?php get_header(); ?>

<script type="text/javascript">
	jQuery(function() {
		jQuery("#category_tab").tabs({selected :0 , fx: {opacity: "toggle" , duration: "fast"}});
	});
</script>




<section class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<div class="pad group">
	    
		<article <?php post_class(); ?>>	
			<div class="post-inner group">
			<h1 class="post-title"><?php the_title(); ?></h1>
			<p class="post-byline"><?php _e('by','hueman'); ?> <?php the_author_posts_link(); ?> &middot; <?php the_time(get_option('date_format')); ?></p>
			<h2><?php echo get_post_meta($post->ID,'Cost',true); ?></h2>
			<div class="entry">
			    <div class="entry-inner">
					<?php if(get_post_meta($post->ID,"キャッチ",true)){ ?>
						<h3><?php echo get_post_meta($post->ID,"キャッチ",true); ?></h3>
					<?php } ?>
					<div id="product_image">
						<!--
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"Image1",true),array(500,500)); ?>
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"Image2",true),array(500,500)); ?>
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"Image3",true),array(500,500)); ?>
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"Image4",true),array(500,500)); ?>
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"Image5",true),array(500,500)); ?>
						-->
										
					
						<div id="category_tab">
							<ul class="tabnavi">
							<li><a href="#tabs-1"><span>Photos</span></a></li>
							<li><a href="#tabs-2"><span>In the Area</span></a></li>
							<li><a href="#tabs-3"><span>Virtual Tour</span></a></li>
							</ul>
							<div id="tabs-1">
								<?php for ($i = 1; $i <= 5; $i++): ?>
									<?php $imgsrc1 = wp_get_attachment_image_src(get_post_meta($post->ID,"Image${i}",true),thumbnail,false); ?>
									<?php $imgsrc2 = wp_get_attachment_image_src(get_post_meta($post->ID,"Image${i}",true),full,false); ?>
									<?php if (get_post_meta($post->ID,"Image${i}",true)) : ?>
										<a href="<?php echo $imgsrc2[0]; ?>" data-rel="lightbox-0"><img src="<?php echo $imgsrc1[0]; ?>" width="125" height="125" border="0" /></a></li>
									<?php endif; ?>
								<?php endfor; ?>
							</div>
							 
							<div id="tabs-2">
		                        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d197.21605680109846!2d175.2420454239396!3d-37.73242377537451!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sus!4v1435920967545" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							 
							<div id="tabs-3">
								<div class="content" style="width:100%; height:380px;">
									<div style="background: url(http://data.autoplay.co.nz/images/top-left.png); position: absolute; margin: 0px;
										    float: none; width: 13px; height: 13px; top: 0px; left: 0px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/top-middle.png); position: absolute; margin: 0px;
									    float: none; width: 500px; height: 13px; top: 0px; left: 13px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/top-right.png); position: absolute; margin: 0px;
									    float: none; width: 13px; height: 13px; top: 0px; left: 513px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/left.png); position: absolute; margin: 0px; float: none;
									    width: 13px; height: 350px; top: 13px; left: 0px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/right.png); position: absolute; margin: 0px; float: none;
									    width: 13px; height: 350px; top: 13px; left: 513px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/bottom-left.png); position: absolute; margin: 0px;
									    float: none; width: 13px; height: 13px; top:363px; left: 0px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/bottom-middle.png); position: absolute; margin: 0px;
									    float: none; width: 500px; height: 13px; top: 363px; left: 13px;">
									</div>
									<div style="background: url(http://data.autoplay.co.nz/images/bottom-right.png); position: absolute; margin: 0px;
									    float: none; width: 13px; height: 13px; top: 363px; left: 513px;">
									</div>
									<div style="overflow: hidden; position: absolute; width:500px; height: 350px; top: 13px; left: 13px; margin:0px; padding:0px;">
									<video id="videoPlayer" class="video-js vjs-default-skin" controls width="500" height="350" data-setup='{"example_option":true}'>
										<source src="http://ap-realestate.s3.amazonaws.com/video/549151.webm" type="video/webm" />
										<source src="http://ap-realestate.s3.amazonaws.com/video/549151.mp4" type="video/mp4" />
									</video>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<hr>
					<div id="product_explanation">
						<dl>
							<dd><p><?php echo get_post_meta($post->ID,'Explain',true); ?></p></dd>
						</dl>
						<hr>
                        <table><tbody>
                        <tr><th>Additional rooms</th><td><?php echo get_post_meta($post->ID,'Additional rooms',true); ?></td></tr>
                        <tr><th>Approx year built</th><td><?php echo get_post_meta($post->ID,'Approx year built',true); ?></td></tr>
                        <tr><th>Aspect</th><td><?php echo get_post_meta($post->ID,'Aspect',true); ?></td></tr>
                        <tr><th>Bedroom 2</th><td><?php echo get_post_meta($post->ID,'Bedroom 2',true); ?></td></tr>
                        <tr><th>Bedroom 3</th><td><?php echo get_post_meta($post->ID,'Bedroom 3',true); ?></td></tr>
                        <tr><th>Bedroom 4</th><td><?php echo get_post_meta($post->ID,'Bedroom 4',true); ?></td></tr>
                        <tr><th>Chattels remaining</th><td><?php echo get_post_meta($post->ID,'Chattels remaining',true); ?></td></tr>
                        <tr><th>Construction</th><td><?php echo get_post_meta($post->ID,'Construction',true); ?></td></tr>
                        <tr><th>Ensuite</th><td><?php echo get_post_meta($post->ID,'Ensuite',true); ?></td></tr>
                        <tr><th>Fencing</th><td><?php echo get_post_meta($post->ID,'Fencing',true); ?></td></tr>
                        <tr><th>Flooring</th><td><?php echo get_post_meta($post->ID,'Flooring',true); ?></td></tr>
                        <tr><th>Garaging / carparking</th><td><?php echo get_post_meta($post->ID,'Garaging / carparking',true); ?></td></tr>
                        <tr><th>Grounds</th><td><?php echo get_post_meta($post->ID,'Grounds',true); ?></td></tr>
                        <tr><th>Heating / Cooling</th><td><?php echo get_post_meta($post->ID,'Heating / Cooling',true); ?></td></tr>
                        <tr><th>House style</th><td><?php echo get_post_meta($post->ID,'House style',true); ?></td></tr>
                        <tr><th>Insulation</th><td><?php echo get_post_meta($post->ID,'Insulation',true); ?></td></tr>
                        <tr><th>Joinery</th><td><?php echo get_post_meta($post->ID,'Joinery',true); ?></td></tr>
                        <tr><th>Kitchen</th><td><?php echo get_post_meta($post->ID,'Kitchen',true); ?></td></tr>
                        <tr><th>Land Size</th><td><?php echo get_post_meta($post->ID,'Land Size',true); ?></td></tr>
                        <tr><th>Land contour</th><td><?php echo get_post_meta($post->ID,'Land contour',true); ?></td></tr>
                        <tr><th>Laundry</th><td><?php echo get_post_meta($post->ID,'Laundry',true); ?></td></tr>
                        <tr><th>Living area</th><td><?php echo get_post_meta($post->ID,'Living area',true); ?></td></tr>
                        <tr><th>Main bathroom</th><td><?php echo get_post_meta($post->ID,'Main bathroom',true); ?></td></tr>
                        <tr><th>Main bedroom</th><td><?php echo get_post_meta($post->ID,'Main bedroom',true); ?></td></tr>
                        <tr><th>Outdoor living</th><td><?php echo get_post_meta($post->ID,'Outdoor living',true); ?></td></tr>
                        <tr><th>Property Type</th><td><?php echo get_post_meta($post->ID,'Property Type',true); ?></td></tr>
                        <tr><th>Property condition</th><td><?php echo get_post_meta($post->ID,'Property condition',true); ?></td></tr>
                        <tr><th>Roof</th><td><?php echo get_post_meta($post->ID,'Roof',true); ?></td></tr>
                        <tr><th>Sewerage</th><td><?php echo get_post_meta($post->ID,'Sewerage',true); ?></td></tr>
                        <tr><th>Tenure</th><td><?php echo get_post_meta($post->ID,'Tenure',true); ?></td></tr>
                        <tr><th>Views</th><td><?php echo get_post_meta($post->ID,'Views',true); ?></td></tr>
                        <tr><th>Water heating</th><td><?php echo get_post_meta($post->ID,'Water heating',true); ?></td></tr>
                        <tr><th>Water supply</th><td><?php echo get_post_meta($post->ID,'Water supply',true); ?></td></tr>
                        </tbody></table>
                    </div>
				</div>
				<div class="clear"></div>
			</div><!--/.entry-->
				
			</div><!--/.post-inner-->	
		</article><!--/.post-->		

		<div class="clear"></div>
		
		<?php the_tags('<p class="post-tags"><span>'.__('Tags:','hueman').'</span> ','','</p>'); ?>
		
		<?php if ( ( ot_get_option( 'author-bio' ) != 'off' ) && get_the_author_meta( 'description' ) ): ?>
			<div class="author-bio">
				<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
				<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
				<p class="bio-desc"><?php the_author_meta('description'); ?></p>
				<div class="clear"></div>
			</div>
		<?php endif; ?>

		<?php if ( ot_get_option( 'post-nav' ) == 'content') { get_template_part('inc/post-nav'); } ?>
		
		<?php if ( ot_get_option( 'related-posts' ) != '1' ) { get_template_part('inc/related-posts'); } ?>
		
		<?php comments_template('/comments.php',true); ?>
		
	</div><!--/.pad-->
	
</section><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>