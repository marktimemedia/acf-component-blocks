<?php
/**
 * Make Page Templates From Plugins Selectable in Editor
 *
 * @package   Mtm_Block_Templates
 * @author    WPExplorer, Tom McFarlin
 * @link      http://www.wpexplorer.com/wordpress-page-templates-plugin/
 * @license   GPL-2.0+
 * @version   1.1.0
 */

/**
* Make the Block Template from the plugin available to use
*/
if ( ! class_exists( 'Mtm_Block_Templates' ) )  {

    class Mtm_Block_Templates {

    		/**
             * A Unique Identifier
             */
    		 protected $plugin_slug;

            /**
             * A reference to an instance of this class.
             */
            private static $instance;

            /**
             * The array of templates that this plugin tracks.
             * This has been changed from 'protected' to 'public' in order to be filterable
             */
            public $templates;

            /**
             * Returns an instance of this class.
             */
            public static function get_instance() {

                    if( null == self::$instance ) {
                            self::$instance = new Mtm_Block_Templates();
                    }

                    return self::$instance;

            }

            /**
             * Initializes the plugin by setting filters and administration functions.
             */
            private function __construct() {

                    $this->templates = array();

                    // Add a filter to the attributes metabox to inject template into the cache.
                    if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

                        // 4.6 and older
                        add_filter(
                            'page_attributes_dropdown_pages_args',
                            array( $this, 'mtm_register_project_block_templates' )
                        );

                    } else {

                        // Add a filter to the wp 4.7 version attributes metabox
                        add_filter(
                            'theme_page_templates', array( $this, 'mtm_add_new_block_template' )
                        );

                    }


                    // Add a filter to the save post to inject out template into the page cache
                    add_filter(
    					'wp_insert_post_data',
    					array( $this, 'mtm_register_project_block_templates' )
    				);


                    // Add a filter to the template include to determine if the page has our
    				// template assigned and return it's path
                    add_filter(
    					'template_include',
    					array( $this, 'mtm_view_project_block_template')
    				);


                    // Add your templates to this array.
                    //'FILE_PATH_AND_NAME'     => 'TEMPLATE_TITLE'
                    $this->templates = array(
                            '../templates/template-block-content.php' => 'Custom Block Template',
                    );

            }

            /**
             * Adds our template to the page dropdown for v4.7+
             *
             */
            public function mtm_add_new_block_template( $posts_templates ) {
                $new_templates = apply_filters( 'mtm_filter_block_templates', $this->templates );
                $posts_templates = array_merge( $posts_templates, $new_templates );
                return $posts_templates;
            }


            /**
             * Adds our template to the pages cache in order to trick WordPress
             * into thinking the template file exists where it doens't really exist.
             */

            public function mtm_register_project_block_templates( $atts ) {

                    // Create the key used for the themes cache
                    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

                    // Retrieve the cache list.
    				// If it doesn't exist, or it's empty prepare an array
                    $templates = wp_get_theme()->get_page_templates();
                    if ( empty( $templates ) ) {
                            $templates = array();
                    }

                    // New cache, therefore remove the old one
                    wp_cache_delete( $cache_key , 'themes');

                    // Now add our template to the list of templates by merging our templates
                    // with the existing templates array from the cache.
                    $new_templates = apply_filters( 'mtm_filter_block_templates', $this->templates );
                    $templates = array_merge( $templates, $new_templates );

                    // Add the modified cache to allow WordPress to pick it up for listing
                    // available templates
                    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

                    return $atts;
            }

            /**
             * Checks if the template is assigned to the page
             * Needs to also check if it is search, or it might return wrong template for search
             */
            public function mtm_view_project_block_template( $template ) {

                    global $post;

                    if ( !$post || !isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) || is_search() || is_404() ) {
                        return $template;
                    }

                    $file = plugin_dir_path( __FILE__ ). get_post_meta(
    					$post->ID, '_wp_page_template', true
    				);

    			// 	Unccoment this and comment out the previous lines if your templates are in a subfolder
                // 	instead of the root
    			// 	$file = plugin_dir_path(__FILE__). 'templates/' .get_post_meta(
    			// 		$post->ID, '_wp_page_template', true
    			// 	);

                    // Just to be safe, we check if the file exist first
                    if( file_exists( $file ) ) {
                            return $file;
                    }
    				else { echo $file; }

                    return $template;

            }
    }
}
