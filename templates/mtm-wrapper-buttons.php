<?php // Hero Image Wrapper
$className = 'mtm_module_buttons';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>

<div class="<?php echo esc_attr($className); ?>">

  <?php mtm_get_block_part( 'mtm-content', 'home-buttons' ); ?>

</div>
