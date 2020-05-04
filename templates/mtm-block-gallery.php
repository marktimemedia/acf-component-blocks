<?php // Module: Gallery
$images = get_field('mtm_module_gallery_images');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)
?>
<div class="content--inner">
	<?php if( get_field( 'mtm_list_title' ) ): ?>
		<h2 class="mtm-module-title"><?php the_field( 'mtm_list_title' ); ?></h2>
	<?php endif;

	if( $images ): ?>
	    <ul class="mtm-module--gallery">
	        <?php foreach( $images as $image ): ?>
	            <a href="<?php echo $image['url']; ?>">
	            	<li class="mtm-module--gallery-image" >
		            	<figure style="background-image:url(<?php echo $image['sizes'][$size]; ?>)"></figure>
			            <?php if($image['caption']): ?><p class="mtm-module--gallery-caption"><?php echo $image['caption']; ?></p><?php endif; ?>
		            </li>
		        </a>
	        <?php endforeach; ?>
	    </ul>
	<?php endif; ?>
</div>
