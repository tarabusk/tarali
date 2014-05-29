<?php
/*
Template Name: Contact Form
*/
?>

<?php 

//If the form is submitted
if(isset($_POST['submitted'])) {

	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
		
		$name = trim($_POST['contactName']);
		$email = trim($_POST['email']);
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
		
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = tarali_get_option (get_option( 'tarali_info_email' ) , get_bloginfo('admin_email'));
			$subject = 'Contact Form Submission from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.get_bloginfo( 'name' ).' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: '.get_bloginfo( 'name' ).' <mail@server.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>


<?php get_header(); ?>

<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1><?php echo __('Thanks ','tarali') ;   ?> <?php echo $name;?></h1>
		<p><?php echo __('Your email was successfully sent. I will be in touch soon.','tarali') ;   ?> </p>
	</div>
    <hr/>
<?php }  ?>

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="contact_form"> 
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error"><?php echo __('There was an error submitting the form.','tarali') ;   ?></p>
		<?php } ?>
	
		<form action="<?php the_permalink(); ?>" name="contactForm" id="contactForm" method="post" onsubmit="return champsok()">
	
			<ol class="forms">
				<li><label for="contactName"><?php echo __('Name','tarali') ;   ?></label>
					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
				
						<span id="alerte_nom" class="error"></span> 
					
				</li>
				
				<li><label for="email"><?php echo __('Email','tarali') ;?> </label>
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField" />				
					<span id="alerte_email" class="error"></span>
					
				</li>
				
				<li class="textarea"><label for="comments"><?php echo __('Comments','tarali') ;?> </label>
					<textarea name="comments" id="comments" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
		
						<span id="alerte_comment" class="error"></span> 
					
				</li>
			<!--	<li class="inline"><input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php// if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy of this email to yourself</label></li> -->
				<li class="screenReader"><label for="checking" class="screenReader"><?php echo __('If you want to submit this form, do not enter anything in this field','tarali') ;?> </label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>
				<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" />
				
				<button type="submit"><?php echo __('Send','tarali') ;?> &raquo;</button></li>
			</ol>
		</form>
	</div>
		
</div>

<?php get_footer(); ?>
