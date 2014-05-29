<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tarali
 */
?>

	</div><!-- #content -->
	<footer id="footer-widget" class="site-footer" role="contentinfo">	
	<div id="" class="tititara_width"> 
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-left')) : ?>
        <!-- If no widget -->
		<?php endif; ?>	
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-center')) : ?>
        <!-- If no widget -->
		<?php endif; ?>	
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-right')) : ?>
        <!-- If no widget -->
		<?php endif; ?>		
	
		<div class="clear"> </div>
	</div>
	</footer><!-- #colophon -->	
	<footer id="colophon" class="site-footer" role="contentinfo">	
		<div class="tititara_width site-info">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-bottom')) : ?>
        <!-- If no widget -->
		<?php do_action( 'tarali_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'tarali' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'tarali' ), 'Tarali', '<a href="http://tarabusk.net" rel="designer">Tarabusk</a>' ); ?>
		<?php endif; ?>	
			
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>