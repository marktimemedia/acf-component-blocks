<?php
/*
Template Name: Custom Block Content Page
Template Post Type: post, page
*/

mtm_load_wrap_header(); ?>

<section class="content--page">

	<?php if( get_field('mtm_block_show_page_title') ) : ?>

		<h1 class="page--title"><?php the_title(); ?><?php edit_post_link( '(Edit)', ' • ' ); ?></h1>

	<?php endif; ?>

	<?php the_content(); ?>

</section>

<?php mtm_load_wrap_footer(); ?>
