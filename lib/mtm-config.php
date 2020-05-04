<?php
/**
* Make block components compatible with non Roots/Sage based themes by calling header and footer
*/
if ( !function_exists( 'mtm_load_wrap' ) ) {
	function mtm_load_wrap() {
		if ( class_exists( 'SageWrapping' ) || class_exists( 'Spring_Wrapping' ) ) {
			return false;
		}

		return true;
	}
	add_action( 'after_setup_theme', 'mtm_load_wrap' );
}

/**
* Load header on standard themes
*/
if (!function_exists( 'mtm_load_wrap_header' ) ) {
	function mtm_load_wrap_header() {

		if ( mtm_load_wrap() ) {
			get_header();
			echo '<main id="main" class="site-main" role="main">';
		}
	}
}
/**
* Load footer on standard themes
*/
if (!function_exists( 'mtm_load_wrap_footer' ) ) {
	function mtm_load_wrap_footer() {

		if ( mtm_load_wrap() ) {
			echo '</main>';
			get_footer();
		}
	}
}

/**
* Add options page for this plugin to be able to enqueue our own stuff
*
*/

if( !function_exists( 'mtm_plugin_options_page' ) ) {
  add_action('acf/init', 'mtm_plugin_options_page');

  function mtm_plugin_options_page() {

      if( function_exists('acf_add_options_sub_page') ) {

          $option_page = acf_add_options_sub_page(array(
            'page_title'    => __('Page & Block Display Settings', 'mtm'),
            'menu_title'    => __('Display Settings', 'mtm'),
            'menu_slug'     => 'page-components-settings',
            'parent_slug'   =>  'options-general.php'
          ));

      }
  }
}


/**
* Remove the wpautop filter from the_content
*/
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', function ($content) {
	if (has_blocks()) {
		return $content;
	}
    return wpautop($content);
});
