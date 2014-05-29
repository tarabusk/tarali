jQuery(document).ready(function() {

   jQuery(".t_bloc_1 h3").each(function(){ 
       var lh=parseInt (jQuery(this).css('height'));
	   var oo=lh % 180;
       if ( lh> 190){ 
		 jQuery(this).css('lineHeight','90px');
	   }
    });  
   
	jQuery(".menu-item").each(function(){ 
      if (typeof(jQuery(this).children("ul").attr('class'))!= "undefined"){
	    jQuery(this).children("a").append("&nbsp;>>");
	  }
    });
	jQuery(".page_item").each(function(){ //alert (jQuery(this).children("ul").attr('class')+'jj');
      if (typeof(jQuery(this).children("ul").attr('class'))!= "undefined"){
	    jQuery(this).children("a").append("&nbsp;>>");
	  }
    });
	var $top_menu     = jQuery( '#site-navigation' ); 
	et_duplicate_menu( jQuery('#masthead ul.nav'), jQuery('#masthead .mobile_nav'), 'mobile_menu', 'et_mobile_menu' );

		function et_duplicate_menu( menu, append_to, menu_id, menu_class ){
			var $cloned_nav;

			menu.clone().attr('id',menu_id).removeClass().attr('class',menu_class).appendTo( append_to );
			$cloned_nav = append_to.find('> ul');
			$cloned_nav.find('.menu_slide').remove();
			$cloned_nav.find('li:first').addClass('et_first_mobile_item');

			append_to.click( function(){
				if ( jQuery(this).hasClass('closed') ){
					jQuery(this).removeClass( 'closed' ).addClass( 'opened' );
					$cloned_nav.slideDown( 500 );
				} else {
					jQuery(this).removeClass( 'opened' ).addClass( 'closed' );
					$cloned_nav.slideUp( 500 );
				}
				return false;
			} );

			append_to.find('a').click( function(event){
				event.stopPropagation();
			} );
		}
	$top_menu.children('div').children('.menu').after( '<span id="et_active_menu_item"></span>' );

		var $current_item_border = jQuery( '#et_active_menu_item' ),
			$current_menu_item   = $top_menu.find( '> div > ul > .current-menu-item' ),
			current_item_width,
			current_item_position;
			
		if (typeof($current_menu_item.attr('id'))=="undefined"){ 		  
		  $current_menu_item   = $top_menu.find( '> div > ul > .current-menu-ancestor' );
		  if (typeof($current_menu_item.attr('id'))=="undefined"){  
		    $current_menu_item   = $top_menu.find( '> div > ul > .current_page_item' )
		  }
		}

		function et_highlight_current_menu_item( $element, animation ) { 
			if ( $element.length ) {
				current_item_width    = $element.width() - 10;
				current_item_position = $element.position().left;

				if ( ! animation ) {
					$current_item_border.css( { 'left' : current_item_position, 'width' : current_item_width } );
				} else {
					$current_item_border.stop(true, true).animate( { 'left' : current_item_position }, 250, function() {
						jQuery(this).animate( { 'width' : current_item_width }, 250 );
					} );
				}
			}
		}
		if (!jQuery(".menu-toggle").is(":visible")){
		jQuery("#top-menu-primary>ul").fadeIn('slow');   
		et_highlight_current_menu_item( $current_menu_item, false );

			$top_menu.find( '> div > ul > li' ).stop(true, true).hover( function() { 
				et_highlight_current_menu_item( jQuery(this), true );
			}, function() {
			 
				//et_highlight_current_menu_item( $current_menu_item, true );
			} );
			
			$top_menu.find( '> div > ul' ).stop(true, true).hover( function() {
				
			}, function() {
			 
				et_highlight_current_menu_item( $current_menu_item, true );
			} );
			}
			
			
	
		
   
	

	jQuery(".home_block>div").hover(function(){
	  jQuery(this).toggleClass('t_bloc_hover');
	})
	
	var container, button, menu;
	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'div' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
	// Menu Mobile
	jQuery(".menu-toggle,.menu-toggle-2").click(function() {
	  //jQuery("#top-menu-primary>ul").fadeIn('slow');   
      jQuery(this ).toggleClass("ouvert");
	});
	
	jQuery(".menu-toggle-2").click(function() {
      jQuery(this ).next('div').toggleClass("toggled");
	});
	
	if (document.getElementById('top-menu-secondary')){
		length = document.getElementById('top-menu-secondary').childNodes[0].querySelectorAll("li").length;
		if (length < 3){// Don't display mobile feature if less than 3 items
		  jQuery(".menu-toggle-2").css("display","none");
		  jQuery("#top-menu-secondary").addClass("none");
		}
	}else{
	  jQuery(".menu-toggle-2").css("display","none");
	}
	
	//if (!jQuery(".menu-toggle-2").is(":visible")){  
	   jQuery("#top-menu-secondary ul li").hover(function(){
		   
			if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideDown();
			  }else{
				jQuery(this).children("ul").stop(true, true).slideDown();
			  } 
			
			},function(){   
			 if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }else{
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }
		 
		 
		});
	//}
	// Gestion du menu	
	 	
		//if (!jQuery(".menu-toggle").is(":visible")){
	   jQuery(".main-navigation ul li").hover(function(){
		  
			if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideDown();
			  }else{
				jQuery(this).children("ul").stop(true, true).slideDown();
			  } 
			
			},function(){   
			 if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }else{
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }
		 	 
		});
			
	//}
	
       	
		// *********** Home page ***********
		
		jQuery('a img').hover(
   function(){ jQuery(this).stop().animate({ opacity : '.75' });  },
   function(){ jQuery(this).stop().animate({ opacity : '1' }); }
  );
});
	