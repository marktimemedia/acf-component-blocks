<?php
$image = _get_sub_field( 'mtm_list_item_image' );
$url = mtm_output_url_override_sub( 'mtm_list_item_link' );
$file = _get_sub_field( 'mtm_list_item_file' );
$content_size = '-full'; ?>

<article class="mtm-list--single">

	<?php if ( $image ) :

		$content_size = '';
		$thumb = $image['sizes'][ 'medium_large' ];
		$alt = $image['alt']; ?>

		<section class="mtm-list--image">
			<figure class="post--thumbnail">
				<?php if( $url ): ?><a aria-hidden="true" tabindex="-1" href="<?php echo esc_url( $url ) ?>"><?php endif; ?>
					<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_html( $alt ); ?>" />
				<?php if( $url ): ?></a><?php endif; ?>
			</figure>
		</section>

	<?php endif; ?>

	<section class="mtm-list--post-content<?php echo $content_size; ?>">
		<h4>
			<?php if( $url ): ?><a href="<?php echo esc_url( $url ) ?>"><?php endif; ?>
				<?php the_sub_field( 'mtm_list_item_heading' ); ?>
			<?php if( $url ): ?></a><?php endif; ?>
		</h4>
		<p><?php the_sub_field( 'mtm_list_item_content' ); ?></p>

		<?php if( $file ):

			mtm_output_file_link( $file );

		endif; ?>

	</section>
</article>
