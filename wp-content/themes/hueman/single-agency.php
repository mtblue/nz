<?php get_header(); ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/hueman/js/jquery.aw-showcase.js"></script>
<script type="text/javascript">
	jQuery(function() {
		jQuery("#category_tab").tabs({selected :0 , fx: {opacity: "toggle" , duration: "fast"}});
	});
	
$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			506,
		content_height:			340,
		fit_to_parent:			false,
		auto:					true,
		interval:				5000,
		continuous:				false,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					false,
		buttons:				true,
		btn_numbers:			false,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			true,
		transition:				'vslide', /* hslide/vslide/fade */
		transition_delay:		300,
		transition_speed:		500,
		show_caption:			'onhover', /* onload/onhover/show */
		thumbnails:				true,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'vertical', /* vertical/horizontal */
		thumbnails_slidex:		0, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
		speed_change:			true, /* Set to true to prevent users from swithing more then one slide at once. */
		viewline:				false /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
	});
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
		    <div class="propFeatures">
		        <ul id="detailFeatures">
		            <li><?php echo get_post_meta($post->ID,"Bedrooms",true); ?> <img src="http://harcourts.co.nz/Images/Icons/bedroom.gif" alt="" /></li>
		            <li><?php echo get_post_meta($post->ID,"Bathrooms",true); ?> <img src="http://harcourts.co.nz/Images/Icons/bathroom.gif" alt="" /></li>
		            <li><?php echo get_post_meta($post->ID,"Total lounges",true); ?> <img src="http://harcourts.co.nz/Images/Icons/lounge.gif" alt="" /></li>
		            <li><?php echo get_post_meta($post->ID,"Dining Room",true); ?> <img src="http://harcourts.co.nz/Images/Icons/dining.gif" alt="" /></li>
		            <li><?php echo get_post_meta($post->ID,"Garage car spaces",true); ?> <img src="http://harcourts.co.nz/Images/Icons/garage.gif" alt="" /></li>
		        </ul>
		    </div>
			<div class="entry">
			    <div class="entry-inner">
					<?php if(get_post_meta($post->ID,"キャッチ",true)){ ?>
						<h3><?php echo get_post_meta($post->ID,"キャッチ",true); ?></h3>
					<?php } ?>
					<div id="product_image">
						<div id="category_tab">
							<ul class="tabnavi">
							<li><a href="#tabs-1"><span>Photos</span></a></li>
							<li><a href="#tabs-2"><span>In the Area</span></a></li>
							<li><a href="#tabs-3"><span>Virtual Tour</span></a></li>
							</ul>
							<div id="tabs-1">
								<div style="width: 648px; margin: auto;">
									<div id="showcase" class="showcase">
										<?php for ($i = 1; $i <= 5; $i++): ?>
										<?php $imgsrc1 = wp_get_attachment_image_src(get_post_meta($post->ID,"Image${i}",true),thumbnail,false); ?>
										<?php $imgsrc2 = wp_get_attachment_image_src(get_post_meta($post->ID,"Image${i}",true),full,false); ?>
											<div class="showcase-slide">
												<div class="showcase-content">
													<a href="<?php echo $imgsrc2[0]; ?>" data-rel="lightbox-0"><img src="<?php echo $imgsrc2[0]; ?>" width="506px" border="0" /></a>
												</div>
												<div class="showcase-thumbnail">
													<img src="<?php echo $imgsrc1[0]; ?>" width="140px" border="0" />
												</div>
											</div>
										<?php endfor; ?>
									</div>
								</div>
							</div>
							 
							<div id="tabs-2">
		                        <iframe src="<?php echo get_post_meta($post->ID,'In the Area',true); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
										<!--<source src="http://ap-realestate.s3.amazonaws.com/video/549151.webm" type="video/webm" />-->
										<source src="<?php echo get_post_meta($post->ID,'Virtual Tour',true); ?>" type="video/mp4" />
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