<section class="mtm-module--slider flexslider" >
	<?php if( have_rows( 'mtm_slider_add_slides' ) ): ?>
	<ul class="slides">
		<?php while ( have_rows( 'mtm_slider_add_slides' ) ) : the_row(); ?>
		<li class="mtm-module--slider-slide" style="background-image:url('<?php echo esc_url( mtm_acf_sub_image_property( 'mtm_hero_image', 'url' ) ); ?>')">
			<a class="mtm-module--slider-link" href="<?php echo esc_url( mtm_output_url_override_sub( 'mtm_home_button_link' ) ); ?>"><div class="mtm-module--slider-content">
					<div class="content--inner">
						<h2 class="mtm-module--slider-title mtm-module-title"><?php esc_attr_e( get_sub_field( 'mtm_hero_headline' ) ); ?></h2>
						<div class="mtm-module--slider-subtitle"><?php the_sub_field( 'mtm_hero_subheading' ); ?></div>
					</div>
				</div></a>
		</li>
		<?php endwhile; ?>
	</ul>
	<?php endif; ?>
</section>
