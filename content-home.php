<?php
/**
 * @package Tarali
 */
?>
<div id="home">
<?php 
   get_template_part('tarali-home');
 ?>
</div>

<div class="home_block">
<?php $nposts= wp_count_posts()->publish; ?>
      <?php if ($nposts > 0) { ?>
        <h3> <?php echo __('Last posts published:', 'tarali'); ?></h3>
		<?php }
		  wp_reset_query(); ?>	
	
		<?php $the_query = new WP_Query( 'posts_per_page=9&ignore_sticky_posts=1&paged='.$paged ); ?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		<div class="view view-ninth" id="post-<?php the_ID(); ?>"> 
		<?php if (tarali_get_option( 'tarali_hp_ef_pst', false )){?>
		  <a href="<?php the_permalink() ?>" style=" display:inline-block; width:100%;height:100%;">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_template_directory_uri() . '/img/default.jpg" />';
				echo '<div class="title-no-thumb">';the_title(); echo'</div>';
			} ?>				
		  </a>
		<?php }else{?>
		  
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_template_directory_uri() . '/img/default.jpg" />';
				echo '<div class="title-no-thumb">';the_title(); echo'</div>';
			} ?>
						
				<div class="mask mask-1"></div>
				<div class="mask mask-2"></div>
				<div class="hp_post">
						<a href="<?php the_permalink() ?>" >
						<h2><?php the_title(); ?></h2>
						
						<p><?php echo strip_tags(tarali_reduce_chaine (get_the_content(), 10)); ?></p>
						</a>
					
				</div>
		  
		<?php } ?>
		</div>	
		 
		
		<?php endwhile;?>
			<?php tarali_paging_nav(); ?>
		<div class="clear"> </div>
	</div>
	