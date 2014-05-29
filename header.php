<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tarali
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
 
<?php //echo  get_option('tarali_info_gg'); ?>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">	
		
	   <?php if (get_option('tarali_sn','on')){ ?>
				<div id="network">
				   <?php 
				   if (get_option('tarali_sn1')!='') echo '<a href="'.get_option('tarali_sn1').'">
				       <img class="network" src="'.get_template_directory_uri().'/img/facebook-icon.png";" alt=""/>
					 </a>';
				   if (get_option('tarali_sn2')!='') echo '<a href="'.get_option('tarali_sn2').'">
				     <img class="network" src="'.get_template_directory_uri().'/img/linkedin-icon.png";" alt=""/>
					 </a>';
				   if (get_option('tarali_sn3')!='') echo '<a href="'.get_option('tarali_sn3').'">
				     <img class="network" src="'.get_template_directory_uri().'/img/twitter-icon.png";" alt=""/>
					 </a>';
				   ?>
				</div>
			<?php } ?>
	    <div class="tititara_width">	
			<div class="site-branding">
			<div class="menu-toggle-2"></div>
			<?php wp_nav_menu( array('theme_location' => 'secondary', 'container_id' => 'top-menu-secondary','container_class' => 'menu_header', 'fallback_cb'=>'none')); ?>
			
				<div class="site-title">
				 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				 <?php $nlt=get_option('tarali_header_nlt'); if ($nlt==''){$nlt=1;}?>
				 <?php if ($nlt!=0) {echo tarali_decorer_titre (get_bloginfo( 'name' ), $nlt);} else {echo get_bloginfo( 'name' );} ?> </a>                 
				</div> 
				<?php if (tarali_get_option('tarali_header_3pt_no','off')=='off') {?>
				<div class="pt_header"> 
				 <div id="pt_1">&bull; </div>
				 <div id="pt_2">&bull; </div>
				 <div id="pt_3">&bull; </div>
				 </div>
				<?php } ?>
				<div class="site-description">
				 <?php bloginfo( 'description' ); ?></div>
				<div class="clear"> </div>
			</div>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="menu-toggle"></div>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tarali' ); ?></a>

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'top-menu-primary' ,'container_class' => 'menu_header', 'after'=>'', 'fallback_cb'     => 'wp_page_menu',) ); ?>
				
			</nav><!-- #site-navigation -->
			
        </div>
		  
	</header><!-- #masthead -->

	<div id="content" class="site-content">
