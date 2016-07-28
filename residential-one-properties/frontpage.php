<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Residential_One_Properties
 */

get_header(); ?>

	<?php
	if(function_exists('get_field')) {
		if( have_rows('highlights') ):
			$i = 0; ?>
			<div class="home-page-highlights">
				<?php while ( have_rows('highlights') ) : the_row();
					$i++;
					$txt = get_sub_field('highlight_text');
					$icon = get_sub_field('highlight_icon');
					$url = get_sub_field('highlight_page_link');
					$img = get_sub_field('highlight_photo');
					if($i == 1) {
						$img_url = $img['sizes']['home-highlight-lg'];
					} else {
						$img_url = $img['sizes']['home-highlight-sm'];
					} ?>
					<a href="<?php echo $url; ?>" class="highlight <?php if($i == 1): echo 'item-full'; endif; ?>" style="background-image:url(<?php echo $img_url; ?>);">
						<div>
							<span class="highlight-text <?php echo $icon; ?>"><?php echo $txt; ?></span>
						</div>
					</a>
			    <?php endwhile; ?>
		    </div><!-- .home-page-highlights -->
		<?php endif;
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
