<?php // Call To Action Wrapper
$anchor = get_field( 'mtm_cta_headline' ) ? sanitize_title_with_dashes( get_field( 'mtm_cta_headline' ) ) : '' ; // title to anchor tag
$className = 'mtm_module_call_to_action';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>

<div class="<?php echo esc_attr($className); ?>" id="<?php echo( esc_html( $anchor ) ); ?>">

  <?php mtm_get_block_part( 'mtm-block', 'call-to-action' ); ?>

</div>
