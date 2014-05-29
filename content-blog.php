<?php
/**
 * @package tarali
 */
?>
		<div class="view view-ninth" id="post-<?php the_ID(); ?>"> 
		<?php if (tarali_get_option( 'tarali_hp_ef_pst', false )){?>
		  <a href="<?php the_permalink() ?>" style=" display:inline-block; width:100%;height:100%;">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/img/default.jpg" />';
				echo '<div class="title-no-thumb">';the_title(); echo'</div>';
			} ?>				
		  </a>
		<?php }else{?>
		  
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/img/default.jpg" />';
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