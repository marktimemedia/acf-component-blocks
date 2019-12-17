<?php // Grid View
global $mtm_grid_row_class;
?>

<div class="mtm-grid--single <?php echo $mtm_grid_row_class; ?>">
	<div class="mtm-grid--single-content">
		<figure class="mtm-grid--image"><?php the_post_thumbnail( 'medium_large' ); ?></figure>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	</div>
</div>
