<?php // Grid View
global $mtm_grid_row_class; 
?>

<div class="mtm-grid--single <?php echo $mtm_grid_row_class; ?>">
	<div class="mtm-grid--single-content">
		<?php the_mtm_post_thumbnail( 'medium_large', 'mtm-grid--image' ); ?>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	</div>
</div>