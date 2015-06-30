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

//if( ! yit_get_option('show-topbar') ) return;
?>  

<!-- START TOP BAR -->
<div id="topbar">
	<div class="container">
		<div class="row">
			<div id="nav" class="span12 <?php echo yit_get_option('navigation-arrow-style'); ?>">
				<!-- START MAIN NAVIGATION -->
				<?php
				/**
				 * @see yit_main_navigation
				 */
				do_action( 'yit_main_navigation') ?>
				<!-- END MAIN NAVIGATION -->
		
				<!-- START TOPBAR LOGIN -->
				<?php
				/**
				 * @see yit_main_navigation
				 */
				do_action( 'yit_topbar_login') ?>
				<!-- END TOPBAR LOGIN -->
			</div>
		</div>
	</div>
</div>
<!-- END TOP BAR -->
