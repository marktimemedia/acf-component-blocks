<?php // Post Object/Gallery
$post_object = get_field( 'mtm_select_post_source' );
$title = get_field( 'mtm_post_source_title' );

if( $post_object ):  // override $post

	$post = $post_object;
	setup_postdata( $post );

    if( $title ) : ?><h2 class="mtm-module--post-heading mtm-module-title"><?php the_title(); ?></h2><?php endif; ?>
    <div class="mtm-module--post-content">
	    <?php the_content(); ?>
	</div>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

<?php endif; ?>
