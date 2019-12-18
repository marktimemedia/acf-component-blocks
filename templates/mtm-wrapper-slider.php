<?php // Slider Wrapper
$className = 'mtm_module_hero_image';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>

<div class="<?php echo esc_attr($className); ?>">

  <?php mtm_get_block_part( 'mtm-block', 'slider' ); ?>

</div>
