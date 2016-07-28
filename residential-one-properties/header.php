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
					<?php if(!is_page_template('frontpage.php')) { ?>
						<nav id="site-alt-navigation" class="alt-navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'desktop_alt', 'menu_id' => 'alt-menu', 'container' => '' ) ); ?>
						</nav><!-- #site-alt-navigation -->
					<?php } ?>
					
					<?php $phone = get_theme_mod('setting_phone');
					if($phone): ?> <a class="tel masthead-tel flex-item" href="tel:<?php echo $phone; ?>"><span>Call for a tour today! </span><?php echo $phone; ?></a><?php endif; ?>

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
