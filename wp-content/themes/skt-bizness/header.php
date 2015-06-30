<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Bizness
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
    <div class="wrapper_main layout_wide" >      
        <header class="header">
        	<div class="container">
                <div class="head_fix">
                 <div id="logo">
                            <h1><a href="<?php echo esc_url(home_url('/'));?>"><?php bloginfo( 'name' ); ?></a></h1>
                    
                    <p><?php bloginfo('description'); ?></p>
                </div>
                <div class="header_right">
                	
               		<div class="social_icons">  
                    <h5><?php _e('Follow us','skt-bizness'); ?></h5> 
                     	<a href="<?php echo esc_url(get_theme_mod('fb_link','#')); ?>" target="_blank" class="facebook"></a>
                     	<a href="<?php echo esc_url(get_theme_mod('twitt_link','#')); ?>" target="_blank" class="twitter"></a>
                     	<a href="<?php echo esc_url(get_theme_mod('in_link','#')); ?>" target="_blank" class="linkedin"></a>
                     	<a href="<?php echo esc_url(get_theme_mod('gplus_link','#')); ?>" target="_blank" class="gplus"></a>
                     	<a href="<?php echo esc_url(get_theme_mod('flickr_link'.'#')); ?>" target="_blank" class="flickr"></a>
                   </div>  
                       		<h6><?php _e('Tel:','skt-bizness'); ?> <?php echo get_theme_mod('phone_textbox','+91 123456789'); ?></h6>
                       		<h6><?php _e('Email:','skt-bizness'); ?> <a href="mailto:<?php echo get_theme_mod('mail_textbox','site@example.com'); ?>"><?php echo get_theme_mod('mail_textbox','site@example.com'); ?></a></h6>
                </div>
	            <div class="clear"></div> 
                </div><!--end.head_fix-->                                                      
            </div>  
             <div id="menu_fix">
             <div class="header_menu">             
                    <div class="mobile_nav"><a href="#"><?php _e('Menu...','skt-bizness'); ?></a></div>
                     <nav id="nav">
                       <?php wp_nav_menu( array('theme_location'  => 'primary' ) ); ?>
                     </nav>                     
             </div> <!--end.header_menu-->  
             </div>          
        </header>		
        <section id="home_slider"> 
        	<?php $default_images = array(
				1 =>  get_template_directory_uri()."/images/slides/slide_01.jpg",
				2 =>  get_template_directory_uri()."/images/slides/slide_02.jpg",
				3 =>  get_template_directory_uri()."/images/slides/slide_03.jpg",
				4 => get_template_directory_uri()."/images/slides/slide_01.jpg",
				5 => get_template_directory_uri()."/images/slides/slide_03.jpg",
			); 
			?>     
        	<?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<4; $i++) {
				if ( get_theme_mod('slide_image'.$i,$default_images[$i]) ) {
					$imgSrc 	= get_theme_mod('slide'.$i, $default_images[$i]);
					$imgTitle	= get_theme_mod('slide_title'.$i);
					$imgDesc	= get_theme_mod('slide_desc'.$i);
					$imgLink	= get_theme_mod('slide_link'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $default_images[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
						$slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ;  ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div>
				    <?php
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                            <h1><?php echo get_theme_mod('slide_title'.$sln, 'Slide Title '.$sln); ?></h1>
                           <p><?php echo get_theme_mod('slide_desc'.$sln, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pulvinar nibh purus, eget convallis erat efficitur eget.'); ?></p>
                    </div>                           
                        <p class="slide_more"><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln, '#'.$sln)); ?>"><?php _e('Read More','skt-bizness'); ?></a></p>
                    </div><?php } ?>
                	
                </div>
                <div class="clear"></div><?php } ?>             
        </section>
        <div class="mainpage-area">   
        <div class="left_shadow"></div>
        <div class="right_shadow"></div>      