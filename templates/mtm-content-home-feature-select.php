<?php
global $mtm_home_feature_count;
?>

<div class="mtm-home-featured--single <?php echo mtm_count_classes( $mtm_home_feature_count ) ?>">
	<div class="mtm-home-featured--single-content">

		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium_large', array('class' => 'mtm-home-featured--image') ); ?>
		</a>
		<div class="mtm-home-featured--single-text">

			<h3 class="mtm-home-featured--single-title"><a href="<?php the_permalink(); ?>">

				<?php if( "Post Title" == _get_sub_field( 'mtm_home_featured_box_title' ) ) :
					the_title();
				else :
					esc_html( the_sub_field( 'mtm_home_featured_box_title' ) );
				endif; ?>

				</a></h3>

			<?php the_excerpt(); ?>
		</div>

	</div>
</div>

<?php wp_reset_postdata(); ?>
