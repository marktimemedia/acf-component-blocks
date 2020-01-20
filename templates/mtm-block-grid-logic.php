<?php // Grid (ACF Repeater Field)

global $mtm_grid_row_class;
$mtm_grid_row_class = mtm_output_row_number();
$orderbyvar = get_field( 'mtm_randomize' ) ? 'rand' : 'date';
$ordervar = 'DESC'; // in case we want to populate this dynamically later
?>
<div class="content--inner">
<?php if( get_field( 'mtm_list_title' ) ): ?>

	<h2 class="mtm-module-title"><?php the_field( 'mtm_list_title' ); ?></h2>

<?php endif;


if( 'Pick From Taxonomy' == get_field( 'mtm_list_archive_select' ) ) : // Taxonomy Source ?>

	<div class="mtm-module--grid">

		<?php if( _get_field( 'mtm_show_taxonomy_links' ) ) :
			mtm_terms_from_taxonomy_links( get_field( 'mtm_list_archive_taxonomy_links' ) ); // output taxonomy
		endif;

		$list_query = mtm_taxonomy_query( 'list', 3, $orderbyvar, $ordervar );
		$taxonomy = mtm_acf_taxonomy_property( 'list', 'taxonomy' );
		$term = mtm_acf_taxonomy_property( 'list', 'slug' );

		if( $list_query->have_posts() ) :

			global $post;
			$org_post = $post; // save this in case we are inside a nested query/post boject

			while( $list_query->have_posts() ) :

				$list_query->the_post();

				mtm_get_block_part( 'mtm-content', 'grid-view' );

			endwhile;

			$post = $org_post; // reset to original query

		endif;

		$viewtext = _get_field( 'mtm_view_all_link_text' ) ? : 'View All';

		if( _get_field( 'mtm_show_view_all_link' ) ) : ?>

			<a class="mtm-view-all-link" href="<?php echo get_term_link( $term, $taxonomy ); ?>"><?php _e( $viewtext, 'mtm' ); ?></a>

		<?php endif;?>

	</div>

<?php elseif( 'Pick From Post Type' == get_field( 'mtm_list_archive_select' ) ) : // Post Type Source ?>

	<div class="mtm-module--grid">

		<?php if( _get_field( 'mtm_show_taxonomy_links' ) ) :
			mtm_terms_from_taxonomy_links( get_field( 'mtm_list_archive_taxonomy_links' ) ); // output taxonomy
		endif;

		$posttype = get_field( 'mtm_list_archive_post_type' );
		$list_post_query_number = get_field( 'mtm_list_archive_taxonomy_number' );
		$list_post_query = mtm_page_component_post_query( $posttype, $list_post_query_number, $orderbyvar, $ordervar );

		if( $list_post_query->have_posts() ) :

			global $post;
			$org_post = $post; // save this in case we are inside a nested query/post object

			while( $list_post_query->have_posts() ) :

				$list_post_query->the_post();

				mtm_get_block_part( 'mtm-content', 'grid-view' );

			endwhile;

			$post = $org_post; // reset to original query

		endif;

		$viewtext = _get_field( 'mtm_view_all_link_text' ) ? : 'View All';

		if( _get_field( 'mtm_show_view_all_link' ) ) :

			if( 'post' == $posttype  ) : // Posts ?>

				<a class="mtm-view-all-link" href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>"><?php _e( $viewtext, 'mtm' ); ?></a>

			<?php elseif( 'page' == $posttype || 'attachment' == $posttype || 'revision' == $posttype || 'nav_menu_item' == $posttype ) : // Unsupported archives

				// Nothing

			else: // everything else ?>

				<a class="mtm-view-all-link" href="<?php echo get_site_url() . '/' . $posttype ?>"><?php _e( $viewtext, 'mtm' ); ?></a>

			<?php endif;

		endif; ?>

	</div>

<?php elseif( 'Add Posts Manually' == get_field( 'mtm_list_archive_select' ) ) : // Post Type Source ?>

	<div class="mtm-module--grid">

		<?php if( _get_field( 'mtm_show_taxonomy_links' ) ) :
			mtm_terms_from_taxonomy_links( get_field( 'mtm_list_archive_taxonomy_links' ) ); // output taxonomy
		endif;

		$grid_posts = _get_field( 'mtm_list_archive_manual_posts' );

		if( $grid_posts ) :

			global $post;
			$org_post = $post; // save this in case we are inside a nested query/post object

			foreach( $grid_posts as $post) : // variable must be called $post (IMPORTANT)

				setup_postdata( $post );

				mtm_get_block_part( 'mtm-content', 'grid-view' );

			endforeach;

			$post = $org_post; // reset to original query

		endif; ?>

	</div>

<?php else : // Manual Source (repeater)

	if( have_rows( 'mtm_add_list_item' ) ) : // Repeater ?>

		<div class="mtm-module--grid">

			<?php while( have_rows( 'mtm_add_list_item' ) ): the_row(); // Loop through each itemm

				mtm_get_block_part( 'mtm-content', 'grid-manual' );

			endwhile; ?>

		</div>

	<?php endif; // End Rows

endif; // End Pick from Source ?>
</div>
