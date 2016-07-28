<?php
/**
 * Template Name: Floor Plan Listing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Residential_One_Properties
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main flex" role="main">

			<div class="wrapper flex-item" id="article-wrapper">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop. ?>
			</div>
			
			<?php if( have_rows('floor_plans') ) { ?>
			<div class="wrapper flex-item" id="floor-plan-listing">
				<div>
					<?php if( have_rows('floor_plans') ){
						$i = 0; ?>
						<ul id="plan-nav">
							<?php while ( have_rows('floor_plans') ) : the_row();
							$i++;
							$plan_name = get_sub_field('floor_plan_name'); ?>
							<li><a class="<?php echo 'plan-' . $i; ?><?php if($i== 1): echo ' active'; endif; ?>" href="#"><?php echo $plan_name; ?></a></li>
							<?php endwhile; ?>
						</ul>
					<?php } ?>

					<?php if( have_rows('floor_plans') ) { ?>
						<div id="plans-wrapper">
							<?php $i = 0;
							while ( have_rows('floor_plans') ) : the_row();
							$i++;
							$plan_name = get_sub_field('floor_plan_name');
							$plan_desc = get_sub_field('floor_plan_description');
							$plan_sq_ft = get_sub_field('floor_plan_square_footage');
							$plan_img = get_sub_field('floor_plan_image'); ?>
							<div class="floor-plan plan-<?php echo $i; ?> <?php if($i== 1): echo 'active'; endif; ?>" <?php if($i == 1): ?>style="display:block"<?php endif; ?>>
								<?php if($plan_name): ?><h3><?php echo $plan_name; ?></h3><?php endif; ?>
								<?php if($plan_desc): ?><span class="description"></span><?php echo $plan_desc; ?></span><?php endif; ?>
								<?php if($plan_sq_ft): ?><span class="sq-ft"></span><?php echo $plan_sq_ft; ?></span><?php endif; ?>
								<?php if($plan_img): ?><img class="plan-img" src="<?php echo $plan_img['sizes']['floor-plan-main']; ?>" alt="<?php echo $plan_img['alt']; ?>"><?php endif; ?>
							</div>
							<?php endwhile; ?>
						</div><!-- #plans-wrapper -->
					<?php } ?>
				</div>
			</div>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
