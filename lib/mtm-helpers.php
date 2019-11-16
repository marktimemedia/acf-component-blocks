<?php

/**
* Get Template Part function used within this plugin & templates
*/
if( !function_exists( 'mtm_get_block_part' ) ) {

  function mtm_get_block_part( $slug, $name = null ) {

      $templates = new Mtm_Block_Template_Loader;

      $templates->get_template_part( $slug, $name );
  }

}


/**
* Post Type Query
*/
if( !function_exists( 'mtm_page_component_post_query' ) ) {
  function mtm_page_component_post_query( $posttype = 'post', $perpage = 3, $orderby = 'date', $order = 'DESC', $notin = 'sticky_posts' ) {
      return new WP_Query( array(
          'post_type'         => array( $posttype ),
          'posts_per_page'    => $perpage,
          'orderby'           => $orderby,
          'order'             => $order,
          'post__not_in'      => get_option( $notin ),
          )
      );
  }
}

/**
* Post Type Query Paged
*/
if( !function_exists( 'mtm_page_component_post_query_paged' ) ) {
  function mtm_page_component_post_query_paged( $posttype = 'post', $perpage = 3, $orderby = 'date', $order = 'DESC', $notin = 'sticky_posts', $paged = 1 ) {
      return new WP_Query( array(
          'post_type'         => array( $posttype ),
          'posts_per_page'    => $perpage,
          'orderby'           => $orderby,
          'order'             => $order,
          'post__not_in'      => get_option( $notin ),
          'paged'             => $paged,
          )
      );
  }
}


/**
* Taxonomy Query
*/
if( !function_exists( 'mtm_page_component_taxonomy_query' ) ) {
  function mtm_page_component_taxonomy_query( $taxonomy, $terms, $perpage = 3, $orderby = 'date', $order = 'DESC' ) {
      return new WP_Query( array(
          'posts_per_page'    => $perpage,
          'orderby'           => $orderby,
          'order'             => $order,
          'tax_query'         => array(
              array(
                  'taxonomy'  => $taxonomy,
                  'field'     => 'slug',
                  'terms'     => $terms,
                  ),
              ),
          )
      );
  }
}

/**
* Taxonomy Query Paged
*/
if( !function_exists( 'mtm_page_component_taxonomy_query_paged' ) ) {
  function mtm_page_component_taxonomy_query_paged( $taxonomy, $terms, $perpage = 3, $orderby = 'date', $order = 'DESC', $paged = 1 ) {
      return new WP_Query( array(
          'posts_per_page'    => $perpage,
          'orderby'           => $orderby,
          'order'             => $order,
          'tax_query'         => array(
              array(
                  'taxonomy'  => $taxonomy,
                  'field'     => 'slug',
                  'terms'     => $terms,
                  ),
              ),
          'paged'             => $paged,
          )
      );
  }
}

/**
* get taxonomy properties from Tax Term ID Field (when term is selected)
*/
if( !function_exists( 'mtm_acf_taxonomy_property' ) ) {
  function mtm_acf_taxonomy_property( $archivetype, $property ){
      $taxid = get_field( 'mtm_' . $archivetype . '_archive_taxonomy' );
      $taxterm = get_term( $taxid );
      return $taxterm->$property;
  }
}

/**
* return the slug/path to a taxonomy, as used in a URL, including parents
* @todo it doesn't work if there's a custom rewrite such as in Settings -> Permalinks
* @todo it only works for one level deep (parent) not grandparent, etc
*/
if( !function_exists( 'mtm_acf_taxonomy_path' ) ) {
  function mtm_acf_taxonomy_path( $archivetype ){
      $taxid = get_field( 'mtm_' . $archivetype . '_archive_taxonomy' );
      $taxterm = get_term( $taxid );
      $parent = $taxterm->parent ? get_term( $taxterm->parent ) : false;
      return $path = $parent ? $parent->slug . '/' . $taxterm->slug : $taxterm->slug;
  }
}

/**
* get taxonomy properties from Tax ID Sub-Field (when term is selected)
*/
if( !function_exists( 'mtm_acf_taxonomy_sub_property' ) ) {
  function mtm_acf_taxonomy_sub_property( $archivetype, $property ){
      $taxid = get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy' );
      $taxterm = get_term( $taxid );
      return $taxterm->$property;
  }
}

/**
* return the slug/path to a taxonomy, as used in a URL, including parents
* @todo it doesn't work if there's a custom rewrite such as in Settings -> Permalinks
* @todo it only works for one level deep (parent) not grandparent, etc
*/
if( !function_exists( 'mtm_acf_taxonomy_sub_path' ) ) {
  function mtm_acf_taxonomy_sub_path( $archivetype ){
      $taxid = get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy' );
      $taxterm = get_term( $taxid );
      $parent = $taxterm->parent ? get_term( $taxterm->parent ) : false;
      return $path = $parent ? $parent->slug . '/' . $taxterm->slug : $taxterm->slug;
  }
}

/**
* Taxonomy Query for Archive Field
*/
if( !function_exists( 'mtm_taxonomy_query' ) ) {
  function mtm_taxonomy_query( $archivetype, $display = 3, $orderby = 'date', $order = 'DESC' ) {

      $taxonomy = mtm_acf_taxonomy_property( $archivetype, 'taxonomy' );
      $terms = mtm_acf_taxonomy_property( $archivetype, 'slug' );

      if( get_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' ) ) {
          $display = get_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' );
      }

      return mtm_page_component_taxonomy_query( $taxonomy, $terms, $display, $orderby, $order );
  }
}

/**
* Taxonomy Query for Sub Field
*/
if( !function_exists( 'mtm_taxonomy_query_sub' ) ) {
  function mtm_taxonomy_query_sub( $archivetype, $display = 3, $order = 'DESC', $orderby = 'date' ) {
      $taxonomy = mtm_acf_taxonomy_sub_property( $archivetype, 'taxonomy' );
      $terms = mtm_acf_taxonomy_sub_property( $archivetype, 'slug' );

      if( get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' ) ) {
          $display = get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' );
      }

      return mtm_page_component_taxonomy_query( $taxonomy, $terms, $display, $orderby, $order );
  }
}

/**
* Taxonomy Query for Sub Field
*/
if( !function_exists( 'mtm_taxonomy_query_sub_paged' ) ) {
  function mtm_taxonomy_query_sub_paged( $archivetype, $display = 3, $order = 'DESC', $orderby = 'date', $paged) {
      $taxonomy = mtm_acf_taxonomy_sub_property( $archivetype, 'taxonomy' );
      $terms = mtm_acf_taxonomy_sub_property( $archivetype, 'slug' );

      if( get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' ) ) {
          $display = get_sub_field( 'mtm_' . $archivetype . '_archive_taxonomy_number' );
      }

      return mtm_page_component_taxonomy_query_paged( $taxonomy, $terms, $display, $orderby, $order, $paged );
  }
}

/**
* Term Links From Defined Taxonomy
*/
if( !function_exists( 'mtm_terms_from_taxonomy_links' ) ) {
  function mtm_terms_from_taxonomy_links( $tax = '' ){

      $terms = get_terms( $tax );

      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
          $count = count( $terms );
          $i = 0;
          $term_list = '<ul class="mtm-component--term-list">';
          foreach ( $terms as $term ) {
              $i++;
              $term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all filed under %s', 'my_localization_domain' ), $term->name ) . '" data-id="' . $term->term_id . '">' . $term->name . '</a></li>';
              if ( $count != $i ) {
                  $term_list .= ' ';
              }
              else {
                  $term_list .= '</ul>';
              }
          }
          echo $term_list;
      }
  }
}

/**
* Get Property from ACF Image Object
*/
if( !function_exists( 'mtm_acf_image_property' ) ) {
  function mtm_acf_image_property( $field = '', $property = '' ) {

      if( _get_field( $field ) ) {
          $image = get_field( $field );

          return $image[ $property ];
      }
  }
}

/**
* Get Property from ACF Sub Image Object
*/
if( !function_exists( 'mtm_acf_sub_image_property' ) ) {
  function mtm_acf_sub_image_property( $field = '', $property = '' ) {

      if( get_sub_field( $field ) ) {
          $image = get_sub_field( $field );

          return $image[ $property ];
      }
  }
}

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * @see https://gist.github.com/slobodan/6156076
 */
 if( !function_exists( 'slbd_count_widgets' ) ) {
  function slbd_count_widgets( $sidebar_id ) {
      // If loading from front page, consult $_wp_sidebars_widgets rather than options
      // to see if wp_convert_widget_settings() has made manipulations in memory.
      global $_wp_sidebars_widgets;
      if ( empty( $_wp_sidebars_widgets ) ) :
          $_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
      endif;

      $sidebars_widgets_count = $_wp_sidebars_widgets;

      if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
          $widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
          $widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
          if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
              // Four widgets per row if there are exactly four or more than six
              $widget_classes .= ' mtm-per-row-4';
          elseif ( $widget_count >= 3 ) :
              // Three widgets per row if there's three or more widgets
              $widget_classes .= ' mtm-per-row-3';
          elseif ( 2 == $widget_count ) :
              // Otherwise show two widgets per row
              $widget_classes .= ' mtm-per-row-2';
          endif;
          return $widget_classes;
      endif;
  }
}

/**
* Add count class
*/
if( !function_exists( 'mtm_count_classes' ) ) {
  function mtm_count_classes( $count = 1 ) {
      $item_count = $count;
      $item_classes = '';

          if( 6 == $item_count || $item_count >= 11 ) :
              // Six items per row if there's six or greater/equal to 10 items
              $item_classes = 'mtm-per-row-6';
          elseif ( 5 == $item_count || $item_count == 10 ) :
              // Three items per row if there's 5 or 8 items
              $item_classes = 'mtm-per-row-5';
          elseif ( 4 == $item_count || $item_count >= 7 && $item_count <= 8 ) :
              // Four items per row if there's 4, 7, or 8 items
              $item_classes = 'mtm-per-row-4';
          elseif ( 3 == $item_count || $item_count == 9 ) :
              // Three items per row if there's three or nine items
              $item_classes = 'mtm-per-row-3';
          elseif ( 2 == $item_count ) :
              // Otherwise show two widgets per row
              $item_classes = 'mtm-per-row-2';
          endif;
          return $item_classes;
  }
}

/**
* Output a per-row class based on how many admin picked
*/
if( !function_exists( 'mtm_output_row_number' ) ) {
  function mtm_output_row_number( $num = 3, $field = 'mtm_grid_archive_per_row' ) {

       if( get_sub_field( $field ) ) {

          $num = get_sub_field( $field );

       } elseif( get_field( $field ) ) {

          $num = get_field( $field );
       }

      return 'mtm-per-row-' . $num;
  }
}

/**
* output either content url or custom url
*/
if( !function_exists( 'mtm_output_url_override_sub' ) ) {
  function mtm_output_url_override_sub( $field1 ='' , $field2 = 'mtm_post_content_link' ) {

      if ( _get_sub_field( $field1 ) ) {

          $url = _get_sub_field( $field1 );

      } elseif ( _get_sub_field( $field2 ) ) {

          $url = _get_sub_field( $field2 );

      } else {

          $url = '';
      }

      return $url;
  }
}

/*
* Output file from custom field
*/
if( !function_exists( 'mtm_output_file_link' ) ) {
  function mtm_output_file_link( $file_field = '', $label_field = '', $prefix = 'fal fa-file fa-file', $showsize = true ) {
      $file = $file_field;
      $text = $label_field ? : 'Download: ' . $file['title'];
      $mime = wp_check_filetype( $file[ 'filename' ] )['ext'] ? '-' . wp_check_filetype( $file[ 'filename' ] )['ext'] : '';
      $file_type = $prefix . $mime;
      $path_info = pathinfo( $file[ 'url' ] );
      $filesize = $showsize ? wp_prepare_attachment_for_js( $file['id'] )['filesizeHumanReadable'] . ' ' : '';

      echo '<span class="file-downloads"><i class="' . $file_type . '"></i> <a href="' . esc_url( $file['url'] ) . '">' . esc_html( $text ) . ' (' . esc_html($filesize) . esc_html( $path_info['extension'] ) . ') ' . '</a></span>';
  }
}

/**
* Check if user has any posts in any post type
* $post_types must be an array
*/
if( !function_exists( 'mtm_check_all_user_posts' ) ) {
  function mtm_check_all_user_posts( $userid = '', $post_types = array('post') ) {
      $count = 0;
      foreach( $post_types as $type ) {
          $count+= count_user_posts( $userid, $type );
      }
      return $count;
  }
}


/**
* Outputs the post thumbnail with fallback for the first inline image, then the default image
*/
if( !function_exists( 'the_mtm_post_thumbnail_inline' ) ) {
	function the_mtm_post_thumbnail_inline( $post_ID = '',  $size = 'full', $class = '', $link = true, $attr ='' ) {

		$attachments = get_children( 'post_parent='. $post_ID .'&post_type=attachment&post_mime_type=image' );

		if ( false !== mtm_acf_check() ) {

			if ( has_post_thumbnail() ) { // is there a post thumbnail?

				if( $link ) { ?> <a href="<?php the_permalink(); ?>"> <?php } ?>
					<figure class="post--thumbnail <?php echo $class; ?>"> <?php the_post_thumbnail( $size, $attr ); ?> </figure>
				<?php if( $link ) { ?> </a> <?php }

			} elseif ( $attachments ) { // is there an inline image?

				$keys = array_reverse( array_keys ( $attachments ) );
				$image = wp_get_attachment_image( $keys[0], $size, true );

				if( $link ) { ?> <a href="<?php the_permalink(); ?>"> <?php } ?>
					<figure class="post--thumbnail <?php echo $class; ?>"> <?php echo $image; ?> </figure>
				<?php if( $link ) { ?> </a> <?php }


			} elseif ( get_field( 'mtm_default_featured_image', 'option' ) ) { // make sure field value exists

				$image = get_field( 'mtm_default_featured_image', 'option' );
				$thumb = $image['sizes'][ $size ];
				$alt = $image['alt'];

				if( $link ) { ?> <a href="<?php the_permalink(); ?>"> <?php } ?>
					<figure class="post--thumbnail default-thumbnail <?php echo $class; ?>"><img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_html( $alt ); ?>" /></figure>
				<?php if( $link ) { ?> </a> <?php }
			}
		}
	}
}
