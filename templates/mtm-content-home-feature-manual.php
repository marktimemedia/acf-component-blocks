<?php
global $mtm_home_feature_count;
?>

<div class="mtm-home-featured--single <?php echo mtm_count_classes( $mtm_home_feature_count ) ?>">
	<div class="mtm-home-featured--single-content">

		<?php
		$image = _get_sub_field( 'mtm_home_featured_image_manual' );
		$imageAlt = get_field( 'mtm_default_featured_image', 'option' );
		$url = mtm_output_url_override_sub( 'mtm_home_featured_content_link_manual', 'mtm_home_featured_content_link_custom' );

		if ( $image ) :

			$thumb = $image[ 'sizes' ][ 'medium_large' ];
			$alt = $image[ 'alt' ];
			?>

			<a href="<?php echo esc_url( $url ); ?>">
				<figure class="post--thumbnail mtm-home-featured--image"><img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_html( $alt ); ?>" /></figure>
			</a>

		<?php elseif ( $imageAlt ) : // make sure field value exists

			$thumb = $imageAlt[ 'sizes' ][ 'medium_large' ];
			$alt = $imageAlt[ 'alt' ];
			?>

			<a href="<?php echo esc_url( $url ); ?>">
				<figure class="post--thumbnail default-thumbnail"><img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_html( $alt ); ?>" /></figure>
			</a>

		<?php endif; ?>

		<div class="mtm-home-featured--single-text">

			<h3 class="mtm-home-featured--single-title"><a href="<?php echo esc_url( $url ); ?>">

				<?php esc_html( _the_sub_field( 'mtm_home_featured_box_manual_title' ) ); ?>

			</a></h3>

			<?php esc_html( _the_sub_field( 'mtm_home_featured_content_manual' ) ); ?>
		</div>

	</div>
</div>
