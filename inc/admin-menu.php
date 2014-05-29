<?php
/*
$arrayFontLink=array(
	'Roboto Condensed' => "Roboto+Condensed:300italic,400italic,700italic,400,700,300", // pour commencer de 1 au lieu de 0 ...
	'Josefin Slab' => "Josefin+Slab:300,400,700,300italic,400italic,700italic",
	'Droid Sans' => "Droid+Sans:400,700",
	'PT Sans' => "PT+Sans:400,700,400italic,700italic",
	'Arvo' => "Arvo:400,700,400italic,700italic",
	'Neucha'=>"Neucha",
	'Pacifico'=> "Pacifico",
	'Merienda'=> "Merienda:400,700"
);

*/

// create custom plugin settings menu
add_action('admin_menu', 'tarali_menu');
 
function tarali_menu() {
 
   add_theme_page(
        
		__('Options Tarali Theme', 'tarali'), 
		__('Options Tarali', 'tarali'),            
		'administrator',       
		'ttarali',        
		'tarali_settings'  
		
	);
    //call register settings function
    add_action( 'admin_init', 'tarali_register_settings' );
}
function tarali_validate_email($input) {
  if (is_email ($input)){
    return $input;
	}
  else{
    $input='';
    return $input;
	}
}

function tarali_sanitize_hex_color( $color ) {
	if ( '' === $color )
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

function tarali_register_settings() {
	register_setting( 'tarali', 'tarali_fcl','tarali_sanitize_hex_color' ); 
    register_setting( 'tarali', 'tarali_lcl','tarali_sanitize_hex_color' ); 	
    register_setting( 'tarali', 'tarali_ff','sanitize_text_field' ); 
    register_setting( 'tarali', 'tarali_title_ff','sanitize_text_field' );	
	
	// Header
	register_setting( 'tarali', 'tarali_header_bkcl','tarali_sanitize_hex_color' );  
	register_setting( 'tarali', 'tarali_header_fcl','tarali_sanitize_hex_color' );
	register_setting( 'tarali', 'tarali_header_ff','sanitize_text_field' );  
	register_setting( 'tarali', 'tarali_header_ccl','tarali_sanitize_hex_color' ); 
	register_setting( 'tarali', 'tarali_header_nlt',  'intval' ); 
	register_setting( 'tarali', 'tarali_header_3pt_noanim', 'sanitize_text_field'); 
	register_setting( 'tarali', 'tarali_header_3pt_no', 'sanitize_text_field'); 
	
	// Blocks Home Page
	register_setting( 'tarali', 'tarali_hp_bl', 'sanitize_text_field' );
	register_setting( 'tarali', 'tarali_hp_txt1', 'sanitize_text_field' );       
	register_setting( 'tarali', 'tarali_hp_txt2','sanitize_text_field' ); 
	
	register_setting( 'tarali', 'tarali_hp_bl_title1','sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_bl_txt1','sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_bl_lk1','sanitize_text_field' ); 
	register_setting( 'tarali', 'tarali_hp_bl_im1','sanitize_text_field' );
	
    register_setting( 'tarali', 'tarali_hp_bl_title2','sanitize_text_field' );  	
	register_setting( 'tarali', 'tarali_hp_bl_txt2','sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_bl_lk2','sanitize_text_field' ); 
	register_setting( 'tarali', 'tarali_hp_bl_im2','sanitize_text_field' );
	
    register_setting( 'tarali', 'tarali_hp_bl_title3','sanitize_text_field' );  	
	register_setting( 'tarali', 'tarali_hp_bl_txt3','sanitize_text_field' ); 	
	register_setting( 'tarali', 'tarali_hp_bl_lk3','sanitize_text_field' ); 
	register_setting( 'tarali', 'tarali_hp_bl_im3','sanitize_text_field' );
	
    register_setting( 'tarali', 'tarali_hp_bl_title4','sanitize_text_field' );  	
	register_setting( 'tarali', 'tarali_hp_bl_txt4','sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_bl_lk4','sanitize_text_field' );     
	register_setting( 'tarali', 'tarali_hp_bl_im4','sanitize_text_field' );
	
	register_setting( 'tarali', 'tarali_hp_ef_pst', 'sanitize_text_field' );

	// Slider Home Page 
    register_setting( 'tarali', 'tarali_sl', 'sanitize_text_field' );
	register_setting( 'tarali', 'tarali_sl_bkcl','tarali_sanitize_hex_color' );
	register_setting( 'tarali', 'tarali_sl_ef','sanitize_text_field' );
	register_setting( 'tarali', 'tarali_sl_thmb','sanitize_text_field' );
	register_setting( 'tarali', 'tarali_sl_cpt','sanitize_text_field' );
    register_setting( 'tarali', 'tarali_sl_pau',  'intval' );		
	//register_setting( 'tarali', 'tarali_sl_nsli', 'intval' );
	
	$n_sl=6;
   for($i = 1; $i <= $n_sl; $i++){
    register_setting( 'tarali', 'tarali_hp_sl_title'.$i,'sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_sl_txt'.$i,'sanitize_text_field' );      
	register_setting( 'tarali', 'tarali_hp_sl_lk'.$i ,'sanitize_text_field'); 
	register_setting( 'tarali', 'tarali_hp_sl_im'.$i,'sanitize_text_field' );
	register_setting( 'tarali', 'tarali_hp_sl_im'.$i.'_id','sanitize_text_field' );
  }
	
	// Social Networks
	register_setting( 'tarali', 'tarali_info_gg','sanitize_text_field' );
	register_setting( 'tarali', 'tarali_info_email', 'tarali_validate_email' );
	
	register_setting( 'tarali', 'tarali_sn' );
	register_setting( 'tarali', 'tarali_sn1', 'esc_url_raw' );
    register_setting( 'tarali', 'tarali_sn2', 'esc_url_raw' );	
	register_setting( 'tarali', 'tarali_sn3', 'esc_url_raw' );
	register_setting( 'tarali', 'tarali_sn4', 'esc_url_raw' );
	
	// Save selected admin option page
	register_setting( 'tarali', 'tarali_sel' );
}

function tarali_settings( )
{
$arrayFont=array('Roboto Condensed','Josefin Slab','Droid Sans','PT Sans' ,'Arvo','Neucha','Pacifico','Merienda', 'Raleway','Yanone Kaffeesatz', 'Fjalla One');
?>
	<div class="wrap-admin">
		<ul class="menu-admin"> 
		  <li id="menu_gen"><?php echo __('General','tarali'); ?></li> 
		  <li id="menu_sli"><?php echo __('Home Page:Slider','tarali'); ?> </li>
		  <li id="menu_hp"><?php echo __('Home Page:Content','tarali'); ?> </li>
		  
		  <li id="menu_goo"><?php echo __('Infos','tarali'); ?></li>
		 <!-- <li id="menu_sn"><?php echo __('Social networks','tarali'); ?></li>-->
		</ul>
		
		
		<form method="post" action="options.php">
		    
		    <input type="hidden"  name="tarali_sel" id="tarali_sel" value="<?php echo get_option( 'tarali_sel' ); ?>">
			<?php	
				settings_fields( 'tarali' );				
			?>
            <div class="bloc_menu" id="bloc_gen">	
			  <!-- HEADER -->
				    <fieldset>
					   <legend><?php echo __('Header','tarali'); ?></legend>
						<table class="form-table">		

						<tr valign="top" >					 
							<th scope="row"><label for="tarali_header_bkcl"><?php echo __('Header background Color','tarali'); ?></label></th>
							<td><input type="text" name="tarali_header_bkcl" value="<?php echo tarali_get_option( 'tarali_header_bkcl', '#fff' ); ?>" class="my-color-field" data-default-color="#1a1a1a" /> </td>
						</tr>	
						
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_header_fcl"><?php echo __('Header Font Color','tarali'); ?></label></th>
							<td><input type="text" name="tarali_header_fcl" value="<?php echo tarali_get_option( 'tarali_header_fcl' , "#222222"); ?>" class="my-color-field" data-default-color="#1a1a1a" /> </td>
						</tr>	
						
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_header_ff"><?php echo __('Header Font Family','tarali'); ?></label></th>
							<td>
							<select id="tarali_header_ff" name="tarali_header_ff">
							<?php foreach($arrayFont as $valeur)
									{
									 echo '<option style="font-family:\''.$valeur.'\'" value="'.$valeur.'"';
 									 if (get_option('tarali_header_ff')==$valeur) echo'selected="selected"';
 									 echo '>'.$valeur.'</option>';																		
									}
							?> </select>
						</td>
						</tr>	
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_header_ccl"><?php echo __('Menu cursor Color','tarali'); ?></label></th>
							<td><input type="text" name="tarali_header_ccl" value="<?php echo tarali_get_option( 'tarali_header_ccl',"#bee915" ); ?>" class="my-color-field" data-default-color="#bee915" /> </td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_header_nlt"><?php echo __('Enlight the nth letter of the title (0 if none)','tarali');  ?></label></th>
						    <td><input type="text" class="only_integer" id="tarali_header_nlt" name="tarali_header_nlt" class="small-text" value="<?php if (get_option('tarali_header_nlt') =="") echo '1'; else echo get_option( 'tarali_header_nlt'); ?>" /></td>			
						</tr>

						
						<tr valign="top" >
					 
						<th scope="row"><label for="tarali_header_3pt_no"><?php echo __('Hide 3 Points in the Header','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_header_3pt_no"  <?php if (tarali_get_option( 'tarali_header_3pt_no', "off" )=="on") echo 'checked="checked"'; ?>> </td>
					   </tr>
					   
					   <tr valign="top" >
					 
						<th scope="row"><label for="tarali_header_3pt_noanim"><?php echo __('No animated 3 Points in the Header','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_header_3pt_noanim"  <?php if (tarali_get_option( 'tarali_header_3pt_noanim', "off" )=="on") echo 'checked="checked"'; ?>> </td>
					   </tr>
					
						
						</table>
					</fieldset>
					
					 <!-- CONTENT -->
					
				<fieldset>
			    <legend><?php echo __('Content','tarali'); ?></legend>
					  <table class="form-table">
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_ff"><?php echo __('Font Family','tarali'); ?></label></th>
							<td>
								<select id="tarali_ff" name="tarali_ff">
								<?php foreach($arrayFont as $valeur)
										{
										 echo '<option style="font-family:\''.$valeur.'\'"  value="'.$valeur.'"';
										 if (get_option('tarali_ff')==$valeur) echo'selected="selected"';
										 echo '>'.$valeur.'</option>';																		
										}
								?> </select>
							</td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_title_ff"><?php echo __('Titles Font Family','tarali'); ?></label></th>
							<td>
								<select id="tarali_title_ff" name="tarali_title_ff">
								<?php foreach($arrayFont as $valeur)
										{
										 echo '<option style="font-family:\''.$valeur.'\'"  value="'.$valeur.'"';
										 if (get_option('tarali_title_ff')==$valeur) echo'selected="selected"';
										 echo '>'.$valeur.'</option>';																		
										}
								?> </select>
							</td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_fcl"><?php echo __('Font Color','tarali'); ?></label></th>
							<td><input type="text" name="tarali_fcl" value="<?php echo tarali_get_option( 'tarali_fcl', '#222222' ); ?>" class="my-color-field" data-default-color="#222222" /> </td>
						</tr>
						<tr valign="top" >					 
							<th scope="row"><label for="tarali_lcl"><?php echo __('Link Color','tarali'); ?></label></th>
							<td><input type="text" name="tarali_lcl" value="<?php echo tarali_get_option( 'tarali_lcl', '#303030' ); ?>" class="my-color-field" data-default-color="#303030" /> </td>
						</tr>
						
						<tr valign="top" >
					 <?php if (tarali_get_option( 'tarali_hp_ef_pst' , false)) {$onaffiche=true;}else{$onaffiche=false;} ?>
						<th scope="row"><label for="tarali_hp_ef_pst"><?php echo __('Cancel animation effect on "last posts"','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_hp_ef_pst"  <?php if ($onaffiche) echo 'checked="checked"'; ?>> </td>
					</tr>
						
					   </table>
				</fieldset>
									
			</div>
		
			<div class="bloc_menu"  id="bloc_sli">
					<!-- SLIDER -->
				<fieldset>
			    <legend><?php echo __('Slider Options - Home page','tarali'); ?></legend>	
				 <table class="form-table">			
					<tr valign="top" >
					 <?php if (get_option( 'tarali_sl' )===false || get_option( 'tarali_sl' )!= '') {$onaffiche=true;}else{$onaffiche=false;} ?>
						<th scope="row"><label for="tarali_sl"><?php echo __('Display slider','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_sl"  <?php if ($onaffiche) echo 'checked="checked"'; ?>> </td>
					</tr>
					
					<tr valign="top" >
				
						<th scope="row"><label for="tarali_sl_ef"><?php echo __('Transition effect','tarali'); ?></label></th>
						<td><select id="tarali_sl_ef" name="tarali_sl_ef">
								<?php $arrayTransition=array('sliceDown',
															'sliceDownLeft',
															'sliceUp',
															'sliceUpLeft',
															'sliceUpDown',
															'sliceUpDownLeft',
															'fold',
															'fade',
															'random',
															'slideInRight',
															'slideInLeft',
															'boxRandom',
															'boxRain',
															'boxRainReverse',
															'boxRainGrow',
															'boxRainGrowReverse');
								    foreach($arrayTransition as $valeur)
										{
										 echo '<option value="'.$valeur.'"';
										 if (get_option('tarali_sl_ef')==$valeur) echo'selected="selected"';
										 echo '>'.$valeur.'</option>';																		
										}
								?> </select> </td>
					</tr>
					
					<tr valign="top" >
				
						<th scope="row"><label for="tarali_sl_cpt"><?php echo __('Caption shape','tarali'); ?></label></th>
						<td><select id="tarali_sl_cpt" name="tarali_sl_cpt">
								<?php $CaptionStyles=array('square', 'round', 'bubble', 'rectangle_bottom');
								    foreach($CaptionStyles as $valeur)
										{
										 echo '<option value="'.$valeur.'"';
										 if (tarali_get_option('tarali_sl_cpt','bubble')==$valeur) echo'selected="selected"';
										 echo '>'.$valeur.'</option>';																		
										}
								?> </select> </td>
					</tr>
					
					
					
					<tr valign="top" >
	
						<th scope="row"><label for="tarali_sl_thmb"><?php echo __('Display thumbnails','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_sl_thmb"  <?php if (get_option( 'tarali_sl_thmb' )!= '') echo 'checked="checked"'; ?>> </td>
					</tr>
					
					
					<tr valign="top">
						<th scope="row"><label  for="tarali_sl_pau"><?php echo __('Slider speed','tarali'); ?></label></th>
						<td><input type="text" class="only_integer" id="tarali_sl_pau" name="tarali_sl_pau" class="small-text" value="<?php echo get_option( 'tarali_sl_pau' ); ?>" /></td>
						
					</tr>
					
					<!--<tr valign="top">
						<th scope="row"><label for="tarali_sl_nsli"><?php //echo __('Number of slides','tarali'); ?></label></th>
						<td><input type="text" class="only_integer" id="tarali_sl_nsli" name="tarali_sl_nsli" class="small-text" value="<?php echo get_option( 'tarali_sl_nsli' ); ?>" /></td>
						
					</tr>-->
				
				</table>
				</fieldset>
				
				<fieldset> 
				<legend><?php echo __('Slider Images - Home page','tarali'); ?></legend>
				<?php echo __('Upload an image 940px * 450px for best result','tarali'); ?> <br/>
				<?php echo __('Each Image of the slider can have (or not) a legende (Title + Text) and an url link to another page','tarali'); ?> <br/>
				
				
				<!-- Image Slider -->
				<?php $display= "display:block;"; ?>
				<?php $n_sl=6;
				  for($i = 1; $i <= $n_sl; $i++){ ?>
				
				 
				   <table class="tarali_hp_sl_im" id="table_<?php echo $i; ?>" style="<?php echo $display; ?>border-bottom:1px solid #eaeaea;padding:10px 0px" >
				    <tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="tarali_hp_sl_title<?php echo $i;?>"><?php echo __('Title Image','tarali'); ?> </label></th>					
						<td><input size="100"type="text" id="tarali_hp_sl_title<?php echo $i;?>" name="tarali_hp_sl_title<?php echo $i;?>" class="medium-text" value="<?php echo tarali_get_option( 'tarali_hp_sl_title'.$i,__('', 'tarali') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_sl_txt<?php echo $i;?>"><?php echo __('Text Image','tarali'); ?></label></th>
						<td> <textarea id="tarali_hp_sl_txt<?php echo $i;?>"  name="tarali_hp_sl_txt<?php echo $i;?>" class="large-text"> <?php echo tarali_get_option( 'tarali_hp_sl_txt'.$i, '' ); ?></textarea></td>
						
					</tr>				
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_sl_lk<?php echo $i;?>"><?php echo __('Link Page','tarali'); ?></label></th>
						
						<td><input type="text" size="100" id="tarali_hp_sl_lk<?php echo $i;?>" name="tarali_hp_sl_lk<?php echo $i;?>" class="medium-text" value="<?php echo get_option( 'tarali_hp_sl_lk'.$i ); ?>" /></td>
					</tr>
					
					<tr valign="top">
					  <th scope="row"><label for="tarali_hp_sl_im<?php echo $i;?>"><?php echo __('Image (940px * 450px)','tarali'); ?></label></th>
					  <td>
						  <input id="tarali_hp_sl_im<?php echo $i;?>" class="medium-text"  type="hidden" " name="tarali_hp_sl_im<?php echo $i;?>" value="<?php echo get_option( 'tarali_hp_sl_im'.$i ); ?>" />
						  <input id="tarali_hp_sl_im<?php echo $i;?>_button" class="tarali_img_btn" type="button" value="<?php echo __('Upload Image','tarali'); ?>" />
						  <img id="tarali_hp_sl_im<?php echo $i;?>_lnk" style="width:80px;float:right" src="<?php echo get_option( 'tarali_hp_sl_im'.$i ); ?>"/>
						  <input id="tarali_hp_sl_im<?php echo $i;?>_id" type="hidden" name="tarali_hp_sl_im<?php echo $i;?>_id" value="<?php echo get_option( 'tarali_hp_sl_im'.$i.'_id');?>" />		 
					     <?php if (tarali_get_option('tarali_hp_sl_im'.$i.'_id', '' )!='' && tarali_get_option( 'tarali_hp_sl_im'.($i+1).'_id', '' )==""){ ?>
						 <input id="delete_tarali_hp_sl_im<?php echo $i;?>" class="tarali_hp_sl_im_delete" type="button" value="<?php echo __('Delete this Image','tarali'); ?>" />  
					     <?php } else { ?>
						 <input id="delete_tarali_hp_sl_im<?php echo $i;?>" style="display:none;"class="tarali_hp_sl_im_delete" type="button" value="<?php echo __('Delete this Image','tarali'); ?>" />   
						 <?php } ?>
					</td>
					</tr>
					
					</table>
					 <?php  $display=tarali_get_option( 'tarali_hp_sl_im'.$i, '' )!=''?"display:block;":"display:none;" ?>
				<?php } // for ?>
				
				</fieldset>
			</div>
				
            <div class="bloc_menu" id="bloc_hp">
                 <fieldset>
			    <legend><?php echo __('Text Home Page','tarali'); ?></legend>			
					 <table class="form-table">		
					   <tr valign="top" >
							<th scope="row"><label for="tarali_hp_txt1"><?php echo __('Title Home page','tarali'); ?></label></th>
							<td> <textarea id="tarali_hp_txt1" name="tarali_hp_txt1" class="large-text"> <?php if (get_option('tarali_hp_txt1','') !=''){echo tarali_get_option( 'tarali_hp_txt1',__('TaraLi - WordPress Theme 2014', 'tarali')  );} ?></textarea></td>
						</tr>	
				
						<tr valign="top" >
							<th scope="row"><label for="tarali_hp_txt2"><?php echo __('Slogan','tarali'); ?></label></th>
							<td> <textarea id="tarali_hp_txt2" name="tarali_hp_txt2" class="large-text"> <?php echo tarali_get_option('tarali_hp_txt2',__('Your Slogan Here', 'tarali')) ?></textarea></td>
						</tr>
					 </table>
				  </fieldset>
				  
				  
				   
				    <fieldset>
			        <legend><?php echo __('Content in Blocks Home Page','tarali'); ?></legend>		
					<?php echo __('Best Size for the Blocks Images : 224px * 182px','tarali'); ?>
					<table class="form-table">	
					<tr valign="top" >
					    <?php if (get_option( 'tarali_hp_bl' )===false || get_option( 'tarali_hp_bl' )!= '') {$onaffiche=true;}else{$onaffiche=false;} ?>
						<th scope="row"><label for="tarali_hp_bl"><?php echo __('Display blocks','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_hp_bl"  <?php if ($onaffiche) echo 'checked="checked"'; ?>> </td>
					</tr>
					<tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="tarali_hp_bl_title1"><?php echo __('Block 1 - Title','tarali'); ?> </label></th>					
						<td><input type="text" id="tarali_hp_bl_title1" name="tarali_hp_bl_title1" class="large-text" value="<?php echo tarali_get_option( 'tarali_hp_bl_title1',__('A Title here', 'tarali') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_txt1"><?php echo __('Block 1 - Text','tarali'); ?></label></th>
						<td> <textarea id="tarali_hp_bl_txt1" name="tarali_hp_bl_txt1" class="large-text"> <?php echo tarali_get_option( 'tarali_hp_bl_txt1', __('A Texte here ... With some more details  ... Configure your Home page from  the Admin Page : Appearance > Options TaraLi', 'tarali') ); ?></textarea></td>
						
					</tr>				
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_lk1"><?php echo __('Block 1 - Link','tarali'); ?></label></th>
						
						<td><input type="text" id="tarali_hp_bl_lk1" name="tarali_hp_bl_lk1" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_lk1' ); ?>" /></td>
					</tr>
					
					<tr valign="top">
					<th scope="row"><label for="tarali_hp_bl_im1"><?php echo __('Block 1 - Image','tarali'); ?></label></th>
					<td><label for="tarali_hp_bl_im1">
					<input id="tarali_hp_bl_im1" class="medium-text"  type="text" size="100" name="tarali_hp_bl_im1" value="<?php echo get_option( 'tarali_hp_bl_im1' ); ?>" />
					<input id="tarali_hp_bl_im1_button" class="tarali_img_btn" type="button" value="<?php echo __('Upload Image','tarali'); ?>" />
					<img id="tarali_hp_bl_im1_lnk" style="width:80px;float:right" src="<?php echo get_option( 'tarali_hp_bl_im1' ); ?>"/>
					<br /><?php echo __('Enter an URL or upload an image for the first block','tarali'); ?>
					</label></td>
					</tr>

					<!-- -->
					<tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="tarali_hp_bl_title2"><?php echo __('Block 2 - Title','tarali'); ?></label></th>					
						<td><input type="text" id="tarali_hp_bl_title2" name="tarali_hp_bl_title2" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_title2' ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_txt2"><?php echo __('Block 2 - Text','tarali'); ?></label></th>
						<td> <textarea id="tarali_hp_bl_txt2" name="tarali_hp_bl_txt2" class="large-text"> <?php echo get_option( 'tarali_hp_bl_txt2' ); ?></textarea></td>					
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_lk2"><?php echo __('Block 2 - Link','tarali'); ?></label></th>
						
						<td><input type="text" id="tarali_hp_bl_lk2" name="tarali_hp_bl_lk2" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_lk2' ); ?>" /></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="tarali_hp_bl_im2"><?php echo __('Block 2 - Image','tarali'); ?></label></th>
					<td><label for="tarali_hp_bl_im2">
					<input id="tarali_hp_bl_im2" class="medium-text" type="text" size="100" name="tarali_hp_bl_im2" value="<?php echo get_option( 'tarali_hp_bl_im2' ); ?>" />
					
					<input id="tarali_hp_bl_im2_button" class="tarali_img_btn" type="button" value="<?php echo __('Upload Image','tarali'); ?>" />
					<img id="tarali_hp_bl_im2_lnk" style="width:80px;float:right" src="<?php echo get_option( 'tarali_hp_bl_im2' ); ?>"/>
					<br /><?php echo __('Enter an URL or upload an image for the second block','tarali'); ?>
					</label></td>
					</tr>
					<!-- -->
					
					<tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="tarali_hp_bl_title3"><?php echo __('Block 3 - Title','tarali'); ?></label></th>					
						<td><input type="text" id="tarali_hp_bl_title3" name="tarali_hp_bl_title3" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_title3' ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_txt3"><?php echo __('Block 3 - Text','tarali'); ?></label></th>
						<td> <textarea id="tarali_hp_bl_txt3" name="tarali_hp_bl_txt3" class="large-text"> <?php echo get_option( 'tarali_hp_bl_txt3' ); ?></textarea></td>					
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_lk3"><?php echo __('Block 3 - Link','tarali'); ?></label></th>
						
						<td><input type="text" id="tarali_hp_bl_lk3" name="tarali_hp_bl_lk3" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_lk3' ); ?>" /></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="tarali_hp_bl_im3"><?php echo __('Block 3 - Image','tarali'); ?></label></th>
					<td><label for="tarali_hp_bl_im3">
					<input id="tarali_hp_bl_im3" class="medium-text"  type="text" size="100" name="tarali_hp_bl_im3" value="<?php echo get_option( 'tarali_hp_bl_im3' ); ?>" />
					<input id="tarali_hp_bl_im3_button" class="tarali_img_btn" type="button" value="<?php echo __('Upload Image','tarali'); ?>" />
					<img id="tarali_hp_bl_im3_lnk" style="width:80px;float:right" src="<?php echo get_option( 'tarali_hp_bl_im3' ); ?>"/>
					<br /><?php echo __('Enter an URL or upload an image for the third block','tarali'); ?>
					</label></td>
					</tr>
					<!-- -->
					
					<tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="tarali_hp_bl_title4"><?php echo __('Block 4 - Title','tarali'); ?></label></th>					
						<td><input type="text" id="tarali_hp_bl_title4" name="tarali_hp_bl_title4" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_title4' ); ?>" /></td>
					</tr>				
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_txt4"><?php echo __('Block 4 - Text','tarali'); ?></label></th>
						<td> <textarea id="tarali_hp_bl_txt4" name="tarali_hp_bl_txt4" class="large-text"> <?php echo get_option( 'tarali_hp_bl_txt4' ); ?></textarea></td>
						
					</tr>
					<tr valign="top">
						<th scope="row"><label for="tarali_hp_bl_lk4"><?php echo __('Block 4 - Link','tarali'); ?></label></th>
						
						<td><input type="text" id="tarali_hp_bl_lk4" name="tarali_hp_bl_lk4" class="large-text" value="<?php echo get_option( 'tarali_hp_bl_lk4' ); ?>" /></td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="tarali_hp_bl_im4"><?php echo __('Block 4 - Image','tarali'); ?></label></th>
					<td><label for="tarali_hp_bl_im4">
					<input id="tarali_hp_bl_im4" class="medium-text"  type="text" size="100" name="tarali_hp_bl_im4" value="<?php echo get_option( 'tarali_hp_bl_im4' ); ?>" />
					<input id="tarali_hp_bl_im4_button" class="tarali_img_btn" type="button" value="<?php echo __('Upload Image','tarali'); ?>" />
					<img id="tarali_hp_bl_im4_lnk" style="width:80px;float:right" src="<?php echo get_option( 'tarali_hp_bl_im4' ); ?>"/>
					<br /><?php echo __('Enter an URL or upload an image for the fourth block','tarali'); ?>
					</label></td>
					</tr>
					<!-- -->
				</table>	
				</fieldset>
		    </div>
			
			<!--<div class="bloc_menu" id="bloc_sn">
					
				 
			</div>-->
			
			<div class="bloc_menu" id="bloc_goo">
			
				<fieldset>
					<legend><?php echo __('Page Template : Contact form','tarali'); ?></legend>	
					<table class="form-table">
					<tr valign="top">
					<th scope="row"><?php echo __('Email for the contact Form','tarali'); ?></th>
					<td><input type="text"  id="tarali_info_email" name="tarali_info_email" class="medium-text" value="<?php echo get_option( 'tarali_info_email' ); ?>" />
					</textarea></td>
					</tr>	
                    <tr valign="top">
					<th scope="row"><?php ?></th>
					<td><?php echo __('Use the --Contact Form-- Template for Pages to add a contact form','tarali'); ?></td>
					</tr>						
					</table>
				</fieldset>
				
			

					
				
				<fieldset>
			    <legend><?php echo __('Social network','tarali'); ?></legend>	
				<table class="form-table">			
					<tr valign="top" >					 
						<th scope="row"><label for="tarali_sn"><?php echo __('Display Social networks infos','tarali'); ?></label></th>
						<td><input type="checkbox" name="tarali_sn"  <?php if (get_option( 'tarali_sn' )=="on") echo 'checked="checked"'; ?>> </td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label  for="tarali_sn1"><?php echo __('Facebook','tarali'); ?></label></th>
						<td><input type="text" class="" id="tarali_sn1" name="tarali_sn1" class="medium-text" value="<?php echo get_option( 'tarali_sn1' ); ?>" /></td>
						
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="tarali_sn2"><?php echo __('LinkedIN','tarali'); ?></label></th>
						<td><input type="text" class="" id="tarali_sn2" name="tarali_sn2" class="small-text" value="<?php echo get_option( 'tarali_sn2' ); ?>" /></td>
						
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="tarali_sn3"><?php echo __('Twitter','tarali'); ?></label></th>
						<td><input type="text" class="" id="tarali_sn3" name="tarali_sn3" class="small-text" value="<?php echo get_option( 'tarali_sn3' ); ?>" /></td>
						
					</tr>
				
				</table>
				</fieldset>
			</div>
			<hr/>
			
				
		

			<p class="submit">
				<input type="submit" class="" value="<?php echo __('Options update','tarali'); ?>" />
			</p>
		</form>
	</div>
<?php
}

///* Add a widget in the dashboard

function tarali_dashboard_widget_function() {

echo "<h2>";
echo __("TaraLi by <a href=\"http://tarabusk.net\">Tarabusk.net</a> - Jan 2014", "tarali");
echo "</h2>";
echo "<h4>";
echo   __("HOME PAGE Customization", 'tarali');
echo "</h4>";
echo "<ul>";
echo "<li>";
echo __("Go to \"Apearance > Options TaraLi\" to customize the content of your Home Page.", "tarali");
echo "</li>";
echo "</ul>";
echo "<h4>";
echo  __("SHORTCODES", "tarali");
echo "</h4>";
echo "<ul>";
echo "<li>";
echo __("Display the last post : <b>[newestpost] </b>", "tarali");
echo "</li>";
echo "<li>";
echo __("Display the n lasts posts : <b> [lastposts nposts=\"n\"]</b>. n takes whatever value you need", "tarali");
echo "</li>";
echo "</ul>";
}
function tarali_add_dashboard_widgets() {
wp_add_dashboard_widget('wp_dashboard_widget', __('How to use TaraLi theme','tarali'), 'tarali_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'tarali_add_dashboard_widgets' );

///* Add Own CSS to the theme

add_action( 'wp_head', 'tarali_myThemeCss' );

function tarali_myThemeCss( )
{
	// Styles files in the options

    $ggf="";
	$ggf_b="<link href='http://fonts.googleapis.com/css?family=";
	$ggf_e="' rel='stylesheet' type='text/css'>";
	$ff=array_unique (array(get_option('tarali_ff'),get_option('tarali_title_ff'),get_option('tarali_header_ff')));
	foreach($ff as $valeur)
{
			switch ( $valeur)
		{
			case 'Roboto Condensed': $ggf.=$ggf_b."Roboto+Condensed:300italic,400italic,700italic,400,700,300".$ggf_e;break;
			case 'Josefin Slab'    : $ggf.=$ggf_b."Josefin+Slab:300,400,700,300italic,400italic,700italic".$ggf_e;break;
			case 'Droid Sans'      : $ggf.=$ggf_b."Droid+Sans:400,700".$ggf_e; break;
			case 'PT Sans'         : $ggf.=$ggf_b."PT+Sans:400,700,400italic,700italic".$ggf_e; break;
			case 'Arvo'            : $ggf.=$ggf_b."Arvo:400,700,400italic,700italic".$ggf_e; break;
			case 'Neucha'          : $ggf.=$ggf_b."Neucha".$ggf_e; break;
			case 'Pacifico'        : $ggf.=$ggf_b."Pacifico".$ggf_e; break;
			case 'Merienda'        : $ggf.=$ggf_b."Merienda:400,700".$ggf_e;break;
			case 'Raleway'         : $ggf.=$ggf_b."Raleway:400,700,200".$ggf_e;break;
			case 'Fjalla One'      : $ggf.=$ggf_b."Fjalla+One".$ggf_e;break;
			case 'Yanone Kaffeesatz': $ggf.=$ggf_b."Yanone+Kaffeesatz:400,700,200".$ggf_e;break;
			default:                 $ggf.=$ggf_b."Roboto+Condensed:300italic,400italic,700italic,400,700,300".$ggf_e;break;
				
		}
}
 
  if ($ggf != ""){
    echo $ggf; 
  } 
  
  ?>
  

	<style type="text/css">
		body {			
			color: <?php echo tarali_get_option( 'tarali_fcl', '#222222' ); ?>;
			font-family:<?php echo "'".tarali_get_option( 'tarali_ff', 'Roboto Condensed' )."'"; ?>;
		}
        nav a{
		  font-family:<?php echo "'".tarali_get_option( 'tarali_ff', 'Roboto Condensed' )."'"; ?>;		
		} 
	    <?php if (tarali_get_option( 'tarali_header_bkcl', '#ffffff' )!="#ffffff"){ ?>
		#masthead, #colophon {
			background-color: <?php echo get_option( 'tarali_header_bkcl'); ?>;
			
		}
		#site-navigation ul ul, .main-navigation ul ul{
		  background-color: <?php echo get_option( 'tarali_header_bkcl' ); ?>;
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
			background-color:<?php echo get_option( 'tarali_header_bkcl'); ?>;	
		}
		
		<?php } ?>
		 <?php if (trim(tarali_get_option( 'tarali_hp_txt1' , ''))==''){ ?>
		
		 <?php } ?>
		 <?php if (tarali_get_option( 'tarali_sl_bkcl', 'off' )!="off"){ ?>
		#tarali_wrap{ 
		  background-color: <?php echo get_option( 'tarali_header_bkcl'); ?>;
		  border: 10px solid <?php echo get_option( 'tarali_header_bkcl'); ?>;
		  border-width:0px 10px;
		}
		#masthead{
         /*border-bottom: none; */ 
		 }
		
		<?php } ?>
		#masthead{
		font-family:<?php echo "'".tarali_get_option( 'tarali_header_ff', 'Roboto Condensed' )."'"; ?>;
		}
		
		<?php if (tarali_get_option( 'tarali_header_fcl', '#222222' )!="#222222"){ ?>
		#masthead, #colophon {
			color : <?php echo tarali_get_option( 'tarali_header_fcl', '#222222' ); ?>;
		}
		.menu-toggle, .menu-toggle-2,.main-navigation ul ul ul,.menu_header ul ul ul{
		  border-color : <?php echo get_option( 'tarali_header_fcl'); ?>;
		}
		
		#masthead a, #colophon a{		
			color : <?php echo get_option( 'tarali_header_fcl'); ?>;
		}
		<?php } ?>
		
		
	
		
		.nivo-caption {
		   border-color:  <?php echo tarali_get_option( 'tarali_header_bkcl', '#ffffff' ); ?>;
		}
		
		.ns_teme_tara .nivo-controlNav a {
		  background: <?php echo tarali_get_option( 'tarali_header_bkcl', '#ffffff' ); ?>;
     
		}
		
        <?php if (tarali_get_option( 'tarali_header_ccl',"#bee915" )!= "#bee915"){ ?>
		.ns_teme_tara .nivo-controlNav a.active {
		   background: <?php echo get_option( 'tarali_header_ccl' ); ?>;
		/*  background: <?php echo tarali_ChangeColor(tarali_get_option( 'tarali_header_bkcl', '#cdcdcd' ), -10); ?>;*/
		}
		.title_letter{
		  color:<?php echo get_option( 'tarali_header_ccl'); ?>;		  
		}
		#top-menu-secondary ul li a {
		border-color:<?php echo get_option( 'tarali_header_ccl'); ?>;	
		}
		#et_active_menu_item {
	        background: <?php echo get_option( 'tarali_header_ccl'); ?>
		}		  
		.menu-toggle, .menu-toggle-2 {	
            background: <?php echo get_option( 'tarali_header_ccl'); ?> ;
		}
		#site-navigation ul>li a:before, #top-menu-secondary ul>li a:before{
		    color :<?php echo get_option( 'tarali_header_ccl'); ?>;
		}
		#top-menu-secondary a:hover, #top-menu-primary a:hover, .menu a:hover,  .nav-menu a:hover {
		  color :<?php echo get_option( 'tarali_header_ccl'); ?>!important;	
		}
		blockquote {
		  border-color:<?php echo get_option( 'tarali_header_ccl'); ?>;	
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
			color:<?php echo get_option( 'tarali_header_ccl'); ?>;	
		}
		
        <?php } ?>
		h1, h2, h3, h4, h5,.title-no-thumb{
		  font-family:<?php echo "'".tarali_get_option( 'tarali_title_ff', 'Roboto Condensed' )."'"; ?>;	
		}
		a{color: <?php echo tarali_get_option( 'tarali_lcl', '#303030' ); ?>;}
		a:hover,
		a:focus,
		a:active {
			color: <?php echo tarali_ChangeColor(get_option( 'tarali_lcl', '#303030' ), 25); ?>; 
		}
		
		<?php 
		for ( $i=1; $i <=4 ; $i++) 
		{ ?>
		.t_bloc_1:nth-child(<?php echo $i; ?>){
		  background:url(<?php echo tarali_get_option( 'tarali_hp_bl_im'.$i, get_template_directory_uri().'/img/default-block.jpg' ); ?> ) ;}
		<?php
		}		
        ?>
		<?php
		if (tarali_get_option('tarali_header_3pt_no','off')=='on') { ?>
		.site-description{margin-left:0;}
		<?php
		}		
        ?>
	
		
	</style>
<?php
}
?>