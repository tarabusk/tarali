<?php
/**
 * Tarali functions and definitions
 *
 * @package Tarali
 */

 require_once (TEMPLATEPATH . '/inc/admin-menu.php');
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tarali_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tarali_setup() {

	load_theme_textdomain( 'tarali', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	 add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in 2 locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tarali' ),
		'secondary' => __( 'Secondary Menu', 'tarali' )
	) );

	
	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tarali_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tarali_setup
add_action( 'after_setup_theme', 'tarali_setup' );

//Add additional generated image sizes
add_image_size( 'tarali-slide', 940, 450, true ); //(cropped)
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function tarali_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tarali' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
        'name' => __( 'footer-right', 'tarali' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div class="footer-right" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));	
	  register_sidebar(array(
        'name' => __( 'footer-center', 'tarali' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div class="footer-center" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));	
	  register_sidebar(array(
        'name' => __( 'footer-left', 'tarali' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div class="footer-left" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => __( 'footer-bottom', 'tarali' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div class="footer-bottom" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));
}
add_action( 'widgets_init', 'tarali_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function tarali_scripts() {  
	wp_enqueue_style( 'tarali-style', get_stylesheet_uri() );
	wp_enqueue_style( 'defaultslider', get_template_directory_uri() . '/css/nivo-tara.css' );
	
	wp_enqueue_script('jquery','', '','',true);		
	wp_enqueue_script( 'tarali-js', get_template_directory_uri() . '/js/tara.js','','',true);	
	wp_enqueue_script('tarali_nivo',get_template_directory_uri().'/js/jquery.nivo.slider.pack.js','','',true);
  
	if (tarali_get_option('tarali_header_3pt_noanim','off')=='off'){
	  wp_enqueue_script( 'tarali-3pts-js', get_template_directory_uri() . '/js/tarali-3pts.js','','',true);
	}
	wp_enqueue_script( 'tarali-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );   
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
	global $tarali; if ( ! empty ( $tarali['post_lightbox_id'] ) ) {
	wp_enqueue_script('tarali_fancybox',get_template_directory_uri().'/js/fancybox.js','','',true);}
	if(is_page_template('contact-form.php')){
	    wp_enqueue_script('tarali-js-contact-f', get_template_directory_uri() .'/js/tara-contact-form.js','','',true);		
	   	wp_localize_script( 'tarali-js-contact-f', 'objectL10n', array(
	    'commentempty'  => __( 'Your comment is empty', 'tarali' ),
	    'emailincorrect' => __( 'Your email is incorrect', 'tarali' ),
		'checkemail' => __( 'Please check your email', 'tarali' ),
		'checknom' => __( 'Please check your name', 'tarali' ),
	   ) );
   }	
	
}
add_action( 'wp_enqueue_scripts', 'tarali_scripts' );

/**
 * Enqueue scripts and styles  in administration.
 */
function tarali_my_enqueue($hook) { 
    if( 'appearance_page_ttarali' != $hook )
        return;
	wp_enqueue_script( 'tarali', get_template_directory_uri() . '/js/admin-tara.js', array('wp-color-picker' ), false, true );
	wp_enqueue_script( 'joliselect', get_template_directory_uri() . '/js/joliSelect.js', array(),true );	
	wp_enqueue_style( 'tarali-admin', get_template_directory_uri() . '/css/tarali-admin.css' );	
	wp_enqueue_style( 'joliselectcss', get_template_directory_uri() . '/css/joliSelect.css' );	
	wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'tarali_my_enqueue' );


/* load nivo slide */
//Load Java Scripts to Footer
add_action('wp_footer', 'tarali_load_js');
function tarali_load_js() { ?>

    <script type="text/javascript">
    jQuery(window).load(function() {
		
		 if(jQuery.support.touch){
			 jQuery('#slider-home').nivoSlider({
                        effect: 'slideInLeft',
                        animSpeed: 550, // Slide transition speed
						pauseTime: <?php echo tarali_get_option('tarali_sl_pau',3000); ?>,                      
                    });
                    jQuery('a.nivo-nextNav').css('visibility', 'hidden');
                    jQuery('a.nivo-prevNav').css('visibility', 'hidden');
                 
                    jQuery('#slider-home').bind( 'swipeleft', function( e ) {
                        jQuery('#slider-home img').attr("data-transition","slideInLeft");
                        jQuery('a.nivo-nextNav').trigger('click');
                        e.stopImmediatePropagation();
                        return false; }     
                    );  
                    jQuery('#slider-home').bind( 'swiperight', function( e ) {
                        jQuery('#slider-home img').attr("data-transition","slideInRight");
                        jQuery('a.nivo-prevNav').trigger('click');
                        e.stopImmediatePropagation();
                        return false; } 
                    ); 
			 } else { 			  
			   <?php if( tarali_get_option('tarali_sl_thmb','off')=='on'){$thumb='true';}else{$thumb='false';}?>			   
		       jQuery('#slider-home').nivoSlider({			  
					effect: '<?php echo tarali_get_option('tarali_sl_ef','random'); ?>',               // Specify sets like: 'fold,fade,sliceDown'
					slices: 12,                     
					boxCols: 8,                    
					boxRows: 4,                     
					animSpeed: 1000,                
					pauseTime: <?php echo tarali_get_option('tarali_sl_pau',3000); ?>,                // How long each slide will show
					startSlide: 0,                 
					directionNav: true,            
					controlNav: true,              
					controlNavThumbs: <?php echo $thumb; ?>,         
					pauseOnHover: true,            
					manualAdvance: false,          
					prevText: 'Prev',               
					nextText: 'Next',               
					randomStart: false,             
					beforeChange: function(){},     // Triggers before a slide transition
					afterChange: function(){} ,      
					slideshowEnd: function(){},     
					lastSlide: function(){},       
					afterLoad: function(){}         
				 });
				 
				 jQuery(".nivo-caption").addClass('<?php echo 'nc_'.tarali_get_option('tarali_sl_cpt','bubble'); ?>');
				 
				/* jQuery(".nivo-caption").each(function(){	
				    jQuery(this).css("display", "none");
                  if (jQuery(this).html()==''){
                    jQuery(this).css("display", "none");
                  }else{			  
				    jQuery(this).addClass('<?php echo 'nc_'.tarali_get_option('tarali_sl_cpt','bubble'); ?>');
				  }
				});*/
	
		}
    });
	 </script>
	
	
	
<?php // } 
} 

/*Fin load nivo slide */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function tarali_ChangeColor($couleur,$changementTon){
  //<0 fonce la couleur , >0 eclaircit la couleur
  
  $couleur=substr($couleur,1,6);
  $cl=explode('x',wordwrap($couleur,2,'x',3));
  $couleur='';
  for($i=0;$i<=2;$i++){
   $cl[$i]=hexdec($cl[$i]);
  
   $cl[$i]=$cl[$i]+$changementTon;
   if($cl[$i]<0) $cl[$i]=0;
   if($cl[$i]>255) $cl[$i]=255;
   $couleur.=StrToUpper(substr('0'.dechex($cl[$i]),-2));
  }
  return '#'.$couleur; 
}

function tarali_get_option($opt, $default_opt){
    $opt=get_option( $opt);	
	
    if ( $opt && $opt!='' ) {
	 return $opt; }
	else {
	 return $default_opt;} 
  }
function tarali_decorer_titre ($titre, $n=2){
    if ($n<=1) $n=1;
	$l=strlen($titre);if ($n> $l) $n=$l;		
	$titre3= '</span>'.substr ( $titre,$n); 
	$titre1= substr ($titre,0, $n-1); 
	$titre2= substr ($titre,$n-1, 1); 
	return $titre1.'<span class="title_letter">'.$titre2.'</span>'.$titre3;
	
}

function tarali_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
function tarali_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'tarali_custom_excerpt_length', 999 );

function tarali_reduce_chaine($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words).' [...]';
}

add_image_size( 'tarali-list', 220, 150, true ); //(cropped)

if ( ! function_exists( 'tarali_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own tarali_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function tarali_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'tarali' ) . '</span>';

	

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'tarali' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'tarali' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'tarali' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

function tarali_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

	/***
	// Add Meta Boxes on Admin Post Init
	***/	
	add_action("admin_init", "tarali_admin_init");
	function tarali_admin_init(){
		add_meta_box("tarali-post-settings-meta", __("Custom Post Settings","tarali"), "tarali_post_settings_box", "post", "side", "default");				
	}
	
	/***
	//	Save
	***/
	add_action('save_post', 'tarali_save_meta_box_content');
	function tarali_save_meta_box_content(){		
		global $post;
		if ($post){
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return $post->ID;
			} else {
				if ( $post->post_type == 'post' ) {
					update_post_meta($post->ID, "tarali_post_settings", $_POST["tarali_post_settings"]);			
				}
				
			}	
		}
	}
	/***
	//	Meta Box Display
	***/
	function tarali_post_settings_box(){
	  global $post;
	  $custom = get_post_custom($post->ID);
	  $tarali_post_settings = isset($custom["tarali_post_settings"][0])?$custom["tarali_post_settings"][0]:'';
	  ?>
	  <p><?php _e('Single post page layout:', 'tarali' ); ?> <select name="tarali_post_settings">
	  	<?php
	  		$custom_post_settings = array(
	  			'fullwidth' => __('Full Width','tarali'),
	  			'rightsidebar' => __('Right Sidebar','tarali'),
				'leftsidebar' => __('Left Sidebar','tarali'),
	  		);	
			foreach ( $custom_post_settings as $custom_settings_key => $custom_settings_value ) {
				if ( $custom_settings_key == $tarali_post_settings ) { $sel = " selected='selected'"; }else{ $sel = ""; }
			  	echo "<option " . $sel . " value='". $custom_settings_key ."'>" . $custom_settings_value . "</option>"; 
			}
	  	?>
		</select></p>
	  <?php
	}
/*** SHORTCODES ***/
// USE :  [newestpost]
/////* Display the newest post */
function tarali_SC_newest_post($atts, $content=null){

	$getpost = get_posts( array('number' => 1) );

	$getpost = $getpost[0];

	$return = '<h3><a href="'.get_permalink($getpost->ID) .'"> '.$getpost->post_title . "</h3></a><br />" . $getpost->post_excerpt . "...";

	$return .= '<br /><a href="' . get_permalink($getpost->ID) . '"><em>'.__('read more', 'tarali') .'&rarr; </em></a>';

	return $return; 

}
add_shortcode('newestpost', 'tarali_SC_newest_post');	


/////* Display the lasts posts */
// USE : [lastposts nposts="xx"]
function tarali_SC_last_posts($atts){
 extract( shortcode_atts( array(
		  'nposts' => '5',
		  'cat' => ''), $atts ) );
	    	
 $q = new WP_Query(
   array( 'orderby' => 'date', 'posts_per_page' => $nposts, 'category_name' => $cat)
 );
while($q->have_posts()) : $q->the_post();
  include ("content-abstract.php");
endwhile;
wp_reset_query();
}

add_shortcode('lastposts', 'tarali_SC_last_posts');

add_filter( 'the_title', 'tarali_title' );

function tarali_title( $title ) {
	if ( $title == '' ) {
	  return __('Untitled', 'tarali');
	} else {
	  return $title;
	}
}
?>