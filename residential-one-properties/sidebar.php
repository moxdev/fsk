<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Residential_One_Properties
 */
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-global') ) :
		 endif;
	?>
	<?php if (is_single() || is_archive() || is_home()) {
		 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-blog') ) :
		 endif;
	} ?>
	<?php if(is_page_template('page-contact.php')) {
		$add = get_theme_mod('setting_address');
		$city = get_theme_mod('setting_city');
		$state = get_theme_mod('setting_state');
		$zip = get_theme_mod('setting_zip');
		$phone = get_theme_mod('setting_phone');
		$fax = get_theme_mod('setting_fax');
		$email = get_theme_mod('setting_email');
		$hours1 = get_theme_mod('setting_hours_1');
		$hours2 = get_theme_mod('setting_hours_2');
		$hours3 = get_theme_mod('setting_hours_3');

		if($hours1 || $hours2 || $hours3) { ?>
			<aside class="widget" id="contact-hours">
				<h3>Office Hours</h3>
				<?php if($hours1): ?><span class="widget-contact-hours"><?php echo $hours1; ?></span><?php endif; echo "\n";
					if($hours2): ?><span class="widget-contact-hours"><?php echo $hours2; ?></span><?php endif; echo "\n";
					if($hours3): ?><span class="widget-contact-hours"><?php echo $hours3; ?></span><?php endif; echo "\n"; ?>
			</aside>
		<?php }

		if($add || $city || $state || $zip) { ?>
			<aside class="widget" id="contact-location">
				<h3>Location</h3>
				<?php if($add): ?><span class="widget-address widget-contact-info"><?php echo $add; ?></span><?php endif; echo "\n";
					if ($city): ?><span class="widget-contact-info"><?php echo $city; ?></span><?php echo ', ' ; endif; echo "\n";
					if ($state): ?><span class="widget-contact-info"><?php echo $state; ?></span><?php echo ' '; endif; echo "\n";
					if($zip): ?><span class="widget-contact-info"><?php echo $zip; ?></span><?php endif; echo "\n"; ?>
			</aside>
		<?php }

		if($phone || $fax) { ?>
			<aside class="widget" id="contact-phone">
				<h3>Phone/Fax/Email</h3>
				<?php if($phone): ?><a class="tel widget-contact-phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a><?php endif;
				if($fax): ?><a class="tel widget-contact-fax" href="fax:<?php echo $fax; ?>"><?php echo $fax; ?></a><?php endif;
				if($email): ?><a href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a><?php endif; ?>
			</aside>
		<?php }

	} ?>
	<?php if(function_exists('residential_one_properties_sidebar_content')) {
		residential_one_properties_sidebar_content();
	} ?>
</div><!-- #secondary -->