<?php // Test Wrapper
$anchor = get_field( 'mtm_cta_headline' ) ? sanitize_title_with_dashes( get_field( 'mtm_cta_headline' ) ) : '' ; // title to anchor tag
$className = 'mtm_module_call_to_action '. mtm_color_picker_class( 'mtm_color_picker_background', false, true );
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>

<div class="<?php echo esc_attr($className); ?>" id="<?php echo( esc_html( $anchor ) ); ?>" style="background-color:<?php the_field('mtm_color_picker_background'); ?>">
  <?php echo __( 'This is a test block for development purposes', 'mtm' ); ?>
  <?php echo get_field('mtm_color_picker_background'); ?>
  <?php mtm_get_block_part( 'mtm-block', 'call-to-action' ); ?>
</div>
