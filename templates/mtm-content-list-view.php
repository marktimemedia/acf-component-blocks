<article class="mtm-list--single">

	<?php $content_size = has_post_thumbnail() ? '' : '-full'; ?>

	<?php if( has_post_thumbnail() ) : ?>
		<section class="mtm-list--image">
			<?php the_mtm_post_thumbnail( 'medium_large', 'mtm-list--image-single' ); ?>
		</section>
	<?php endif; ?>

	<section class="mtm-list--post-content<?php echo $content_size; ?>">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<p class="post--byline"><?php the_time( 'F j, Y' ); ?></p>
		<?php the_excerpt(); ?>
	</section>

</article>