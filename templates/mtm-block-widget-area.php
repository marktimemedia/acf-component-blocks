<?php // Module: Widget
$widgetname = get_field( 'mtm_select_widget_area' );
?>
<div class="content--inner">
<?php if( get_field( 'mtm_widget_area_title' ) ) : ?>
	<h2 class="mtm-module--widget-heading mtm-module-title"><?php the_field( 'mtm_widget_area_title' ) ?></h2>
<?php endif;

if( get_field( 'mtm_select_widget_area' ) ) : ?>
	<div class="mtm-module--widget">
		<?php dynamic_sidebar( $widgetname ); ?>
	</div>
<?php endif; ?>
</div>
