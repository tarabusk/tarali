	function EstUnEmail(chaine)
	{ 
	  var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
	 
		if(reg.test(chaine))
		{
			return(true);
		}
		else
		{
			return(false);
		}
	}

	function champsok(){
	   
		 if (document.contactForm.contactName.value == ''){
			jQuery("#alerte_nom").html(objectL10n.checknom);
			jQuery("#alerte_nom").fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(500);
			jQuery('html,body').animate({scrollTop: jQuery("#alerte_nom").offset().top - 100}, 'slow'      );
			return false;
		}
		else if (document.contactForm.email.value == '') {
			jQuery("#alerte_email").html(objectL10n.checkemail);
			jQuery("#alerte_email").fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(500);
			jQuery('html,body').animate({scrollTop: jQuery("#alerte_email").offset().top- 100}, 'slow'      );
			return false;
		}else if (!EstUnEmail(document.contactForm.email.value)	){
			jQuery("#alerte_email").html(objectL10n.emailincorrect);
			jQuery("#alerte_email").fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(500);
			jQuery('html,body').animate({scrollTop: jQuery("#alerte_email").offset().top- 100}, 'slow'      );
		
			return false;
		}else if (document.contactForm.comments.value == '') {
		
			jQuery("#alerte_comment").html(objectL10n.commentempty);
			jQuery("#alerte_comment").fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(400).delay(200).fadeOut(400).delay(200).fadeIn(500);
			jQuery('html,body').animate({scrollTop: jQuery("#alerte_comment").offset().top- 100}, 'slow'      );
			return false;
		}
		
		return true;
	   }

jQuery(document).ready(function() {



		jQuery('.requiredField').click(function() {
		  jQuery(this).next('span').fadeOut('slow');

		})
})