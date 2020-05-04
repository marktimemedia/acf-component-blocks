<?php // Manual Grid
global $mtm_grid_row_class;

$url = mtm_output_url_override_sub( 'mtm_list_item_link' );
$image = _get_sub_field( 'mtm_list_item_image' );
$file = _get_sub_field( 'mtm_list_item_file' ) ?>

<div class="mtm-grid--single <?php echo $mtm_grid_row_class; ?>">
	<div class="mtm-grid--single-content">
		<?php if ( $image ) :
			$content_size = '';
			$thumb = $image['sizes'][ 'medium_large' ];
			$alt = $image['alt']; ?>
			<figure class="post--thumbnail">
				<?php if( $url ): ?><a aria-hidden="true" tabindex="-1" href="<?php echo esc_url( $url ) ?>"><?php endif; ?>
					<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_html( $alt ); ?>" />
				<?php if( $url ): ?></a><?php endif; ?>
			</figure>
		<?php endif; ?>
		<h4>
			<?php if( $url ): ?><a href="<?php echo esc_url( $url ) ?>"><?php endif; ?>
				<?php the_sub_field( 'mtm_list_item_heading' ); ?>
			<?php if( $url ): ?></a><?php endif; ?>
		</h4>
		<p><?php the_sub_field( 'mtm_list_item_content' ); ?></p>
		<?php if( $file ): mtm_output_file_link( $file ); endif;?>
	</div>
</div>
