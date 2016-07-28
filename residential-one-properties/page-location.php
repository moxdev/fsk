<?php
/**
 * Template Name: Location Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Residential_One_Properties
 */

get_header(); ?>

	<?php if(function_exists('get_field')) {
		$lat = get_field('latitude');
		$lng = get_field('longitude');
		if($lat && $lng): ?><div id="map-canvas"></div><?php endif;

		function residential_one_properties_lat_lng() {
			$lat = get_field('latitude');
			$lng = get_field('longitude'); ?>
			<script>
				var latitude = <?php echo $lat; ?>;
				var longitude = <?php echo $lng; ?>;
			</script>
		<?php }
		add_action(wp_footer, 'residential_one_properties_lat_lng');
	} ?>

	<div class="wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .wrapper -->
<?php get_footer();
