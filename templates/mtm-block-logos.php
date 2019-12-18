<?php // Logos (ACF Repeater Field) ?>

<div class="content--inner">

	<?php if( get_field( 'mtm_logo_title' ) ): ?>

		<h2 class="mtm-module-title"><?php the_field( 'mtm_logo_title' ); ?></h2>

	<?php endif;

	$count = count( get_field( 'mtm_logo_repeater' ) );

	if( have_rows( 'mtm_logo_repeater' ) ):

		$j=1; ?>

		<div class="mtm-module--logos">

			<?php while( have_rows( 'mtm_logo_repeater' ) ): the_row(); // Loop through each item ?>


				<a class="mtm-logo-grid mtm-per-row-<?php echo $count; ?> logo-<?php echo $j++; ?>" href="<?php esc_url( the_sub_field( 'mtm_logo_link' ) ); ?>"><img src="<?php echo esc_url( mtm_acf_sub_image_property( 'mtm_logo_image', 'url' ) ); ?>"></a>

			<?php endwhile; ?>

		</div>

	<?php endif; // End ACF Repeater Field ?>
</div>
