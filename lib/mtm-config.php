<?php
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
            'menu_title'    => __('Display Settings', 'mym'),
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
