 <div id="tarali_wrap"> 
<?php 
    $h1_ok=false;
	if (tarali_get_option( 'tarali_hp_txt1' , '')){
      $h1_ok=true;
	  echo '<h1>'.get_option( 'tarali_hp_txt1' ).'</h1>';
	} 
  if (get_option( 'tarali_sl' )===false || get_option( 'tarali_sl' )!= '') {$onaffiche=true;}else{$onaffiche=false;} 
  if($onaffiche){ 
?>
   
	<div class="slider-wrapper ns_teme_tara">
		<div id="slider-home" class="nivoSlider">	
         <?php 
			$n_sl=6;
			$aff_dft=tarali_get_option('tarali_hp_sl_im1_id', '')=='';
			   for($i = 1; $i <= $n_sl; $i++){	
                   			   
				   $taralidata = tarali_get_option( 'tarali_hp_sl_lk'.$i, '' ); 
				   $taralinivoimg = wp_get_attachment_image_src( tarali_get_option('tarali_hp_sl_im'.$i.'_id', ''), 'tarali-slide', false, '' ); 		
				   $taralinivothmb = wp_get_attachment_thumb_url(tarali_get_option('tarali_hp_sl_im'.$i.'_id', '') );			  
				  ?>	
				<?php if (tarali_get_option('tarali_hp_sl_im'.$i.'_id', '')!=''){ ?>	
				   <a href="<?php echo $taralidata; ?>"><img src="<?php echo $taralinivoimg[0] ?>"  data-thumb="<?php echo $taralinivothmb ?>" alt="<?php echo $taralititle; ?>" title="#nv_<?php echo $i; ?>" /></a>
                <?php }else if ($i <=3 && $aff_dft){ ?>
                   <img data-thumb="<?php echo get_template_directory_uri(); ?>/img/slide<?php echo $i;?>-thumb.jpg" title="#nv_<?php echo $i; ?>" src="<?php echo get_template_directory_uri(); ?>/img/slide<?php echo $i;?>.jpg" />
              <?php  }				?>
			<?php } ?>	       			
		</div>	
      
        <?php for($i = 1; $i <= $n_sl; $i++){ ?>       
                 <?php if (tarali_get_option('tarali_hp_sl_im'.$i.'_id', '')!=''){  ?>	
				 <?php $titre =tarali_get_option('tarali_hp_sl_title'.$i, '');$legend=tarali_get_option('tarali_hp_sl_txt'.$i, '');	?>		
				
				<div id="nv_<?php echo $i; ?>" class="nivo-html-caption">
				    <?php if ($titre !='' || $legend != ''){ ?>
				    <a href="<?php echo tarali_get_option( 'tarali_hp_sl_lk'.$i, '' ) ; ?>" title="" rel="bookmark">	
                   		  
					<?php if ($titre !=  '') {echo '<h2 class="entry-title">'.$titre. '</h2>';} ?>
					<?php if ($legend != '') {echo $legend;} ?>
					</a>
					<?php } ?>
				</div> 
				
			<?php }else if ($i <=3 && $aff_dft){ ?>
            <div id="nv_<?php echo $i; ?>" class="nivo-html-caption">
				   <a href="#" title="TaraLi" rel="bookmark">					
					<?php echo '<h2 class="entry-title">TaraLi</h2>' ; ?>
					<?php echo 'A New WordPress Theme 2014'; ?>
					</a>
				 </div>
					<?php
             }	?>
            
                		
         <?php } ?>	
	</div>
	
	<?php
    } ?>
</div>
<?php
if(get_option('tarali_hp_txt2','') !=''){ 
  if ($h1_ok){
    echo '<div id="slogan_HP">'.tarali_get_option('tarali_hp_txt2',__('Your Slogan Here', 'tarali')).' </div>';
  }else{
    echo '<h1 id="slogan_HP">'.tarali_get_option('tarali_hp_txt2',__('Your Slogan Here', 'tarali')).' </h1>';
  }
}	
    if (get_option( 'tarali_hp_bl' )===false || get_option( 'tarali_hp_bl' )!= '') {$onaffiche=true;}else{$onaffiche=false;} 
    if($onaffiche){ 
?>

	<div class="home_block">
	       <div  class="t_bloc_1"> 
			  <a href="<?php echo get_option( 'tarali_hp_bl_lk1' ); ?>"> <p><?php echo tarali_get_option( 'tarali_hp_bl_txt1', __('A Text here ... With some more details  ... Configure your Home page from  the Admin Page : Appearance > Options TaraLi', 'tarali') ); ?></p>	<h3><?php echo tarali_get_option( 'tarali_hp_bl_title1',__('A Title here', 'tarali') );?></h3>
		  </a>  
		
			</div>
			<div  class="t_bloc_1"> 
			  <a href="<?php echo get_option( 'tarali_hp_bl_lk2' ); ?>"><p><?php echo get_option( 'tarali_hp_bl_txt2' ); ?></p><h3><?php echo get_option( 'tarali_hp_bl_title2' ); ?></h3>		</a>   
		
			</div>
			<div  class="t_bloc_1"> 
			  <a href="<?php echo get_option( 'tarali_hp_bl_lk3' ); ?>"><p><?php echo get_option( 'tarali_hp_bl_txt3' ); ?></p><h3><?php echo get_option( 'tarali_hp_bl_title3' ); ?></h3>	</a> 	  
		
			</div>
			<div  class="t_bloc_1"> 
			  <a href="<?php echo get_option( 'tarali_hp_bl_lk4' ); ?>"><p><?php echo get_option( 'tarali_hp_bl_txt4' ); ?></p><h3><?php echo get_option( 'tarali_hp_bl_title4' ); ?></h3>	</a> 	  
		
			</div>
	</div>
<?php 
} 

?>
<?php if (is_page()){ ?>
<div id="primary-home" class="content-area">
		<main id="main" class="site-main-page" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'tarali' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'tarali' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				</article>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
</div><!-- #primary -->
<?php } ?>
 
<div class="blog_block">
    
		<?php wp_reset_postdata();  ?>
		<?php $nbmax= 9; ?>
		<?php $tarali_query = new WP_Query('posts_per_page='.$nbmax.'&ignore_sticky_posts=1&paged='.$paged); ?>
		<?php while ($tarali_query -> have_posts()) : $tarali_query -> the_post(); ?>
			<?php get_template_part( 'content-blog', get_post_format() );	?>												
		<?php endwhile; ?>
		<?php tarali_paging_nav(); ?>	
	
</div><!-- blog_block -->	
	 
