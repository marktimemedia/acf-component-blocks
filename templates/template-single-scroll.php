<?php
/*
Template Name: Single Scroll Page
*/

mtm_load_wrap_header(); ?>
<section class="mtm-component mtm-component--home home-standard single-scroll-main" style="background-image:url('<?php echo esc_url( mtm_acf_image_property( 'mtm_home_background_image', 'url' ) ); ?>')">
	<section class="content--page">

		<?php if( get_field('mtm_block_show_page_title') ) : ?>

			<h1 class="page--title"><?php the_title(); ?><?php edit_post_link( '(Edit)', ' • ' ); ?></h1>

		<?php endif; ?>

		<?php while ( have_posts() ) : the_post();
			the_content();
		endwhile; ?>

	</section>

</section>

<?php // Single Scroll Select (ACF Relationship Field)

$scroll_posts = get_field( 'mtm_select_pages' );

if( $scroll_posts ):

	$j=1;

	foreach( $scroll_posts as $post): // variable must be called $post (IMPORTANT)

		setup_postdata( $post ); ?>

		<section id="<?php echo $post->post_name; ?>" class= "mtm-component mtm-section-<?php echo $j++; ?>">

			<section class="content--<?php echo $post->post_name; ?>">

				<div class="content--page">

					<?php if( false !== get_field('mtm_block_show_page_title') ) : ?>

						<h1 class="page--title"><?php the_title(); ?><?php edit_post_link( '(Edit)', ' • ' ); ?></h1>

					<?php endif; ?>

					<?php the_content(); ?>

				</div>

			</section>

		</section>

	<?php endforeach;

	wp_reset_postdata();

endif; ?>



<?php mtm_load_wrap_footer(); ?>
