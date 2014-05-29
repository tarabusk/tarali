jQuery(document).ready(function() {
var tps=0; 
		jQuery( '.site-branding' ).stop(true, true).hover( function() {  			 
			  jQuery('#pt_1').delay(tps).animate( { 'marginTop' : "-20px" }, 250, function() {
						jQuery(this).animate( { 'marginTop' :  "0" }, 230 );
				 	} );
			tps=tps+30;
				
			  jQuery('#pt_2').delay(tps).animate( { 'marginTop' : "-20px" }, 250, function() {
						jQuery(this).animate( { 'marginTop' :  "0" }, 240 );
				 	} );
					tps=tps+40;
			  jQuery('#pt_3').delay(tps).animate( { 'marginTop' : "-20px" }, 250, function() {
						jQuery(this).animate( { 'marginTop' :  "0" }, 250 );
				 	} );			  
			},
			function(){  			 
			  jQuery('#pt_1').delay(tps).animate( { 'marginTop' :  "0" }, 200 );;				 	 							
			  jQuery('#pt_2').delay(tps).animate( { 'marginTop' :  "0" }, 200 );				 	 					
			  jQuery('#pt_3').delay(tps).animate( { 'marginTop' :  "0" }, 200 );				 	 			  
			})			
			;
			})