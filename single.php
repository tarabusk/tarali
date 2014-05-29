<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tarali
 */

get_header(); ?>
    <?php
	  $tarali_post_settings = get_post_meta($post->ID, 'tarali_post_settings', true);
	  switch ($tarali_post_settings)
		{
			case 'rightsidebar':$class_post="content-area-left"; $displayside=true; break;
			case'leftsidebar':$class_post="content-area-right"; $displayside=true; break;						
			default: $class_post="content-area"; $displayside=false; break;				
		}
	 
	?>
	<div id="primary" class="<?php echo $class_post; ?>">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php tarali_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ($displayside) {get_sidebar(); }?>
<?php get_footer(); ?>