<?php // Home Buttons (ACF Repeater Field)
$align = get_field( 'mtm_button_alignment' ) ? : 'default';
$size = get_field( 'mtm_button_size' ) ? : 'default';

if( have_rows( 'mtm_home_button_repeater' ) ):
	$j=1; ?>
	<div class="mtm-home-buttons <?php echo $align; ?>">
		<?php while( have_rows( 'mtm_home_button_repeater' ) ): the_row(); // Loop through each item ?><a class="button mtm-button home-button home-<?php echo $j++ . ' ' . $size; ?>" href="<?php echo esc_url( mtm_output_url_override_sub( 'mtm_home_button_link' ) ); ?>"><?php the_sub_field( 'mtm_home_button_label' ); // sub field value goes here ?></a><?php endwhile; ?>
	</div>
<?php endif; // End ACF Repeater Field ?>
