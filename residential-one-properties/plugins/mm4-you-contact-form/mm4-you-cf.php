<?php
/*
Plugin Name: MM4 You Contact Form
Description: Contact form to work with the MM4 You theme
Version: 1
Author: Chris Stielper
License: GPL
*/

add_action('admin_menu', 'mm4_you_add_gcf_interface');

function mm4_you_add_gcf_interface() {
	add_menu_page( 'Contact Form Page', 'Contact Forms', 'manage_options', 'mm4_you_cf_options', 'mm4_you_cf_options' );
}

function mm4_you_cf_options() {?>
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options') ?>
    	<h1>Contact Form Settings</h1>
		<p>Enter the page ID of the contact form "Thank You" page. This is the page users will see after the form is submitted.<br>
		<input type="text" name="mm4-you-cf-page-id" size="5" value="<?php echo get_option('mm4-you-cf-page-id'); ?>"></p>
		
		<p>Enter the email address(es) that you would like the contact form to submit to. (Separate multiple email addresses with a comma and replace the "@" symbol with "_AT_").<br>
		<input type="text" name="mm4-you-cf-email-add" size="25" value="<?php echo get_option('mm4-you-cf-email-add'); ?>"></p>
		
		<input type="hidden" name="action" value="update">
		<input type="hidden" name="page_options" value="mm4-you-cf-page-id, mm4-you-cf-email-add">
		
		<p><input type="submit" name="Submit" value="Update Options"></p>
		
	</form>
<?php }

function mm4_you_contact_page_form() {
	$tyPage = get_option('mm4-you-cf-page-id'); 
	$action = get_permalink($tyPage);
	if(is_page_template('page-contact.php')) {
		wp_enqueue_script( 'mm4-you-jquery-ui-lib', get_template_directory_uri() . '/plugins/mm4-you-contact-form/js/min/jquery-ui-min.js', array('jquery'), '20160524', true ); 
		wp_enqueue_script( 'mm4-you-validate-lib', get_template_directory_uri() . '/plugins/mm4-you-contact-form/js/validate.min.js', array('jquery'), '20150904', true );
		wp_enqueue_script( 'mm4-you-main-form-validate', get_template_directory_uri() . '/plugins/mm4-you-contact-form/js/min/form-main-validate-min.js', array('jquery', 'mm4-you-validate-lib'), '20150826', true ); ?>
		<form id="form-main-contact" name="form-main-contact" method="post" action="<?php echo $action; ?>" novalidate>
			<?php $recipients = get_option('mm4-you-cf-email-add'); ?>
			<input type="hidden" value="<?php echo $recipients; ?>" name="recipients" id="recipients">
			<input type="hidden" value="Online Contact Form for <?php echo bloginfo('name'); ?>" name="subject" id="subject">
			<label for="contact-first-name"><span class="asterisk">*</span> First Name</label>
			<input type="text" id="contact-first-name" name="contact-first-name">
			<label for="contact-last-name"><span class="asterisk">*</span> Last Name</label>
			<input type="text" id="contact-last-name" name="contact-last-name">
			<label for="contact-email"><span class="asterisk">*</span> Email</label>
			<input type="email" id="contact-email" name="contact-email">
			<label for="contact-phone">Phone Number</label>
			<input type="tel" id="contact-phone" name="contact-phone">
			<label for="contact-move-date">Desired Move-In Date</label>
			<input type="text" id="contact-move-date" name="contact-move-date">
			<label for="contact-how-hear">How Did You Hear About Us?</label>
			<input type="text" id="contact-how-hear" name="contact-how-hear">
			<label for="contact-comments">Comments</label>
			<textarea name="contact-comments" rows="5" id="contact-comments"></textarea>
			<label for="spam" class="honey">What is 1 plus two + 4?</label>
			<input name="spam" type="text" size="4" id="spam" maxlength="4" class="honey">
			<div class="error-box"></div>
			<input type="submit" value="Submit Request">
		</form>
	<?php }
}

function mm4_you_cf_require_contact_script() {
	require ('inc/contact.php');
}

function mm4_you_cf_thank_you_page() {
	global $post;
	$ID = $post->ID;
	$tyPage = get_option('mm4-you-cf-page-id');
	// echo 'ID = ' . $ID . '<br>Thank you page = ' . $tyPage . '<br>'; 
	if( $ID == $tyPage ) {
		require ('inc/contact.php');
	}
}

add_action('wp_head', 'mm4_you_cf_thank_you_page');

?>