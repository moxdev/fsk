<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Residential_One_Properties
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'residential-one-properties' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper flex">
				<div class="site-branding flex-item" itemscope itemtype="http://schema.org/ApartmentComplex">
					<?php if(function_exists('the_custom_logo') && get_custom_logo()) {
						the_custom_logo();
					} else { ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } ?>
				</div><!-- .site-branding -->

				<div class="flex-item">
					<?php if(is_page_template('frontpage.php')) { ?>
						<a class="download-link" href="<?php echo esc_url( home_url( '/' ) ); ?>download/Application.pdf" download="Application.pdf">download application <span><svg id="download-icon" data-name="download icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.51 27.26"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:#231f20;}</style><clipPath id="clip-path" transform="translate(-269 -404.74)"><rect class="cls-1" x="269" y="404.74" width="26.51" height="27.26"/></clipPath></defs><title>download icon</title><g class="cls-2"><path class="cls-3" d="M284,416.37H274a0.47,0.47,0,1,0,0,.94h10a0.47,0.47,0,0,0,0-.94m0-3.77H274a0.47,0.47,0,1,0,0,.93h10a0.47,0.47,0,0,0,0-.93M288,430a0.51,0.51,0,0,1-.51.51h-9.29l-0.84.27a1.71,1.71,0,0,1-.52.08,1.59,1.59,0,0,1-1-.35H271a0.51,0.51,0,0,1-.51-0.51V408.52A0.51,0.51,0,0,1,271,408H273v0.81a0.51,0.51,0,0,0,1,0V408h2.93v0.81a0.51,0.51,0,1,0,1,0V408h2.55v0.81a0.51,0.51,0,1,0,1,0V408h2.81v0.81a0.51,0.51,0,1,0,1,0V408h2.17a0.51,0.51,0,0,1,.51.51v3.54l1.53-1.53v-2a2,2,0,0,0-2-2h-2.17v-1.23a0.51,0.51,0,1,0-1,0v1.23H281.5v-1.23a0.51,0.51,0,0,0-1,0v1.23h-2.55v-1.23a0.51,0.51,0,0,0-1,0v1.23H274v-1.23a0.51,0.51,0,1,0-1,0v1.23H271a2,2,0,0,0-2,2V430a2,2,0,0,0,2,2H287.5a2,2,0,0,0,2-2v-7.43L288,424.06V430Zm0.48-15a0.38,0.38,0,0,0-.54,0l-7.87,7.87a0.38,0.38,0,0,0,.54.54l7.87-7.87a0.38,0.38,0,0,0,0-.54m-7,12.32-2.61-2.61-0.7,2.2,1.11,1.11Zm7.17-14,4.23,4.24-10.1,10.1a0.81,0.81,0,0,1-.35.22l-0.06,0-5.27,1.68a0.36,0.36,0,0,1-.47-0.47l1.68-5.27,0-.06a0.79,0.79,0,0,1,.22-0.36l1.9-1.9H274a0.47,0.47,0,1,1,0-.94h7.35Zm6.46,2-1.52,1.52-4.24-4.23,1.52-1.52a1.15,1.15,0,0,1,1.61-.13l2.76,2.76a1.15,1.15,0,0,1-.13,1.61" transform="translate(-269 -404.74)"/></g></svg></span></a>
					<?php } ?>

					<?php if(!is_page_template('frontpage.php')) { ?>
						<div class="alt-download-section flex-item">
							<a class="alt-download-link" href="<?php echo esc_url( home_url( '/' ) ); ?>download/Application.pdf" download="Application.pdf">download application <span><svg id="alt-download-icon" data-name="alt download icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.51 27.26"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:#231f20;}</style><clipPath id="clip-path" transform="translate(-269 -404.74)"><rect class="cls-1" x="269" y="404.74" width="26.51" height="27.26"/></clipPath></defs><title>download icon</title><g class="cls-2"><path class="cls-3" d="M284,416.37H274a0.47,0.47,0,1,0,0,.94h10a0.47,0.47,0,0,0,0-.94m0-3.77H274a0.47,0.47,0,1,0,0,.93h10a0.47,0.47,0,0,0,0-.93M288,430a0.51,0.51,0,0,1-.51.51h-9.29l-0.84.27a1.71,1.71,0,0,1-.52.08,1.59,1.59,0,0,1-1-.35H271a0.51,0.51,0,0,1-.51-0.51V408.52A0.51,0.51,0,0,1,271,408H273v0.81a0.51,0.51,0,0,0,1,0V408h2.93v0.81a0.51,0.51,0,1,0,1,0V408h2.55v0.81a0.51,0.51,0,1,0,1,0V408h2.81v0.81a0.51,0.51,0,1,0,1,0V408h2.17a0.51,0.51,0,0,1,.51.51v3.54l1.53-1.53v-2a2,2,0,0,0-2-2h-2.17v-1.23a0.51,0.51,0,1,0-1,0v1.23H281.5v-1.23a0.51,0.51,0,0,0-1,0v1.23h-2.55v-1.23a0.51,0.51,0,0,0-1,0v1.23H274v-1.23a0.51,0.51,0,1,0-1,0v1.23H271a2,2,0,0,0-2,2V430a2,2,0,0,0,2,2H287.5a2,2,0,0,0,2-2v-7.43L288,424.06V430Zm0.48-15a0.38,0.38,0,0,0-.54,0l-7.87,7.87a0.38,0.38,0,0,0,.54.54l7.87-7.87a0.38,0.38,0,0,0,0-.54m-7,12.32-2.61-2.61-0.7,2.2,1.11,1.11Zm7.17-14,4.23,4.24-10.1,10.1a0.81,0.81,0,0,1-.35.22l-0.06,0-5.27,1.68a0.36,0.36,0,0,1-.47-0.47l1.68-5.27,0-.06a0.79,0.79,0,0,1,.22-0.36l1.9-1.9H274a0.47,0.47,0,1,1,0-.94h7.35Zm6.46,2-1.52,1.52-4.24-4.23,1.52-1.52a1.15,1.15,0,0,1,1.61-.13l2.76,2.76a1.15,1.15,0,0,1-.13,1.61" transform="translate(-269 -404.74)"/></g></svg></span></a>
						</div>
					<?php } ?>

					<?php if(!is_page_template('frontpage.php')) { ?>
						<nav id="site-alt-navigation" class="alt-navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'desktop_alt', 'menu_id' => 'alt-menu', 'container' => '' ) ); ?>
						</nav><!-- #site-alt-navigation -->
					<?php } ?>

					<?php $phone = get_theme_mod('setting_phone');
					if($phone):
						if(is_page_template('frontpage.php')) { ?>
							<a class="tel masthead-tel flex-item" href="tel:<?php echo $phone; ?>"><span>Call for a tour today! <span class="mast-phone"><?php echo $phone; ?></span></span></a>
						<?php }else { ?>
							<a class="tel alt-masthead-tel flex-item" href="tel:<?php echo $phone; ?>"><span>Call for a tour today! <span class="mast-phone"><?php echo $phone; ?></span></span></a>
						<?php }
					endif; ?>

					<?php if(is_page_template('frontpage.php')) { ?>
						<nav id="site-navigation-desktop-frontpage" class="site-navigation-frontpage">
							<?php wp_nav_menu( array( 'theme_location' => 'desktop_primary_home', 'menu_id' => 'desktop-frontpage-main-menu', 'container' => '' ) ); ?>
						</nav><!-- #site-navigation-desktop-frontpage -->
					<?php } ?>

					<button id="mobile-toggle" class="menu-toggle flex-item icon-hamburger" aria-controls="mobile-menu" aria-expanded="false"><?php esc_html_e( '', 'residential-one-properties' ); ?></button>
				</div>
			</div><!-- .wrapper -->
			<?php if(!is_page_template('frontpage.php')) { ?>
				<nav id="site-navigation-desktop" class="site-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'desktop_primary', 'menu_id' => 'desktop-main-menu', 'container' => '' ) ); ?>
				</nav><!-- #site-navigation-desktop -->
			<?php } ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
