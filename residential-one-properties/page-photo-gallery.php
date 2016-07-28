<?php
/**
 * Template Name: Photo Gallery Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Residential_One_Properties
 */

get_header(); ?>

	<div class="wrapper wrapper-wide gallery-wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<div class="wrapper">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

				<?php if(function_exists('get_field')) {
					if( have_rows('gallery_images') ) { ?>
						<div class="flex">
							<?php while ( have_rows('gallery_images') ) : the_row();
							$img = get_sub_field('image'); ?>
							<div class="flex-item">
								<a data-imagelightbox="c" href="<?php echo $img['sizes']['gallery-main']; ?>"><img src="<?php echo $img['sizes']['gallery-thumb']; ?>" alt="<?php echo $img['alt']; ?>" data-caption="<?php echo $img['caption']; ?>"></a>
							</div>
							<?php endwhile; ?>
						</div>
					<?php }
				} ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .wrapper -->

<?php get_footer();