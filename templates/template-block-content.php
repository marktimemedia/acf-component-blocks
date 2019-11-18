<?php
/*
Template Name: Custom Block Content Page
Template Post Type: post, page
*/

mtm_load_wrap_header();
$pageclass = get_field('mtm_block_show_page_title') ? 'content--page' : 'content--page no-title'?>

<section class="<?php echo $pageclass; ?>">

	<?php if( get_field('mtm_block_show_page_title') ) : ?>

		<h1 class="page--title"><?php the_title(); ?><?php edit_post_link( '(Edit)', ' • ' ); ?></h1>

	<?php endif; ?>

	<?php while ( have_posts() ) : the_post();
		the_content();
	endwhile; ?>

</section>

<?php mtm_load_wrap_footer(); ?>
