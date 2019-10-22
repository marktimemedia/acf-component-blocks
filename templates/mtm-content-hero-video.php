<?php // Hero Video/Media
$headline = ( ( 'Custom Headline' == get_field( 'mtm_hero_select_title' ) ) ? get_field( 'mtm_hero_headline' ) : get_the_title() );
?>

<section class="mtm-module--hero mtm-hero-video">
	<div class="mtm-module--hero-media embed-container video-asset">

		<?php the_field( 'mtm_hero_embed' ); ?>

	</div>
	<div class="mtm-module--hero-content mtm-hero-video-content">
		<div class="content--inner">
			<h2 class="mtm-module--hero-title mtm-hero-video-title mtm-module-title"><?php esc_attr_e( $headline ) ?></h2>
			<?php if( get_field( 'mtm_hero_subheading' ) ): ?>
				<div class="mtm-module--hero-subtitle mtm-hero-video-subtitle"><?php the_field( 'mtm_hero_subheading' ); ?></div>
			<?php endif; ?>
			<?php mtm_get_block_part( 'mtm-content', 'home-buttons' ); ?>
		</div>
	</div>
</section>
