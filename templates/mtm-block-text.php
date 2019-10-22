<?php // Module: Text Single & Dual
$image = get_field( 'mtm_callout_background_image' );
?>
<div class="content--inner">

	<?php if( get_field( 'mtm_text_area_title' ) ) : ?>

		<h2 class="mtm-module--content-heading mtm-module-title"><?php the_field( 'mtm_text_area_title' ) ?></h2>

	<?php endif;

	if( get_field( 'mtm_module_text_area' ) ) : ?>

		<div class="mtm-module--content-primary">
			<?php the_field( 'mtm_module_text_area' ) ?>
		</div>

	<?php endif;

	if( get_field( 'mtm_module_text_area_2' ) ) :

		if( $image ) : ?>
			<div class="mtm-module--content-secondary">
				<div class="mtm-module--content-secondary-image" style="background-image:url('<?php echo $image['sizes']['large']; ?>')">
					<span class="mtm-module--content-secondary-wrapper">
						<?php the_field( 'mtm_module_text_area_2' ) ?>
					</span>
				</div>
			</div>

		<?php else : ?>

			<div class="mtm-module--content-secondary">
					<?php the_field( 'mtm_module_text_area_2' ) ?>
			</div>

		<?php endif;
	endif; ?>
</div>
