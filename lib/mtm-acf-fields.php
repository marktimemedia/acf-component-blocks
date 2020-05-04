<?php
/**
 * Registers all ACF Fields
 *
 * To filter the layouts directly:
 *
 * function my_mtm_layouts_filter( $array ){
 *
 *		// Add new fields to the end of the array
 *		array_push( $array, array( 'my_key' => my_array_function() ) );
 *
 *		// Remove existing fields from the array
 *		unset( $array['field_key'] );
 *
 *		return $array;
 *	}
 *	add_filter( 'mtm_content_modules_layouts_filter', 'my_mtm_layouts_filter' );
 */

/**
* Modular Fields
*/
class Mtm_Acf_Add_Local_Block_Field_Groups extends Mtm_Block_Field_Groups {

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'mtm_add_field_groups' ), 2 );
	}

	public function mtm_add_field_groups() {

		if( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( $this->mtm_block_single_content_area() );
			acf_add_local_field_group( $this->mtm_block_dual_content_area() );
			acf_add_local_field_group( $this->mtm_block_content_callout() );
			acf_add_local_field_group( $this->mtm_block_hero_image() );
			acf_add_local_field_group( $this->mtm_block_hero_media() );
			acf_add_local_field_group( $this->mtm_block_slider() );
			acf_add_local_field_group( $this->mtm_block_feature_boxes() );
			acf_add_local_field_group( $this->mtm_block_buttons() );
			acf_add_local_field_group( $this->mtm_block_call_to_action() );
			acf_add_local_field_group( $this->mtm_block_logo_showcase() );
			acf_add_local_field_group( $this->mtm_block_widget_area() );
			acf_add_local_field_group( $this->mtm_block_list_manual() );
			acf_add_local_field_group( $this->mtm_block_grid_manual() );
			acf_add_local_field_group( $this->mtm_block_list_posts() );
			acf_add_local_field_group( $this->mtm_block_grid_posts() );
			acf_add_local_field_group( $this->mtm_block_tabs() );
			acf_add_local_field_group( $this->mtm_block_gallery() );

			acf_add_local_field_group( $this->mtm_template_block_content() );
			acf_add_local_field_group( $this->mtm_template_block_single_scroll() );
			acf_add_local_field_group( $this->mtm_enable_jump_button() );
		}
	}
} // END class

new Mtm_Acf_Add_Local_Block_Field_Groups();


/**
 * Registers all Project-specific (non-modular) ACF Fields
 * Declares all Field Groups
 */

function mtm_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom-blocks',
				'title' => __( 'Custom Blocks', 'custom-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'mtm_block_category', 10, 2);

 function register_acf_block_types() {

     // Single Content Area
     acf_register_block_type(array(
         'name'              => 'mtm_block_single_content_area',
         'title'             => __('Single Content Block'),
         'description'       => __('WYSIWYG Text block with subtitle'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-single-content.php',
         'category'          => 'custom-blocks',
         'icon'              => 'welcome-write-blog',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Dual Content Area
     acf_register_block_type(array(
         'name'              => 'mtm_block_dual_content_area',
         'title'             => __('Dual Content Block'),
         'description'       => __('Two WYSIWYG text blocks with subtitle'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-dual-content.php',
         'category'          => 'custom-blocks',
         'icon'              => 'admin-page',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Content + Callout
     acf_register_block_type(array(
         'name'              => 'mtm_block_content_callout',
         'title'             => __('Content + Callout Block'),
         'description'       => __('Two differently styled WYSIWYG text blocks with subtitle and optional background image'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-content-callout.php',
         'category'          => 'custom-blocks',
         'icon'              => 'welcome-add-page',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Call To Action
     acf_register_block_type(array(
         'name'              => 'mtm_block_call_to_action',
         'title'             => __('Call To Action Block'),
         'description'       => __('Call to action with title, subtitle, and buttons'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-call-to-action.php',
         'category'          => 'custom-blocks',
         'icon'              => 'welcome-view-site',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Buttons
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_buttons',
 				 'title'             => __('Multi Button Block'),
 				 'description'       => __('Display multiple buttons'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-buttons.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'screenoptions',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Manual List
     acf_register_block_type(array(
         'name'              => 'mtm_block_list_manual',
         'title'             => __('Manual List Block'),
         'description'       => __('Manually create content that will be displayed in a list format'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-list-manual.php',
         'category'          => 'custom-blocks',
         'icon'              => 'excerpt-view',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Content List
     acf_register_block_type(array(
         'name'              => 'mtm_block_list_posts',
         'title'             => __('Content List Block'),
         'description'       => __('Select existing content that will be displayed in a list format'),
         'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-list-post.php',
         'category'          => 'custom-blocks',
         'icon'              => 'excerpt-view',
         'keywords'          => array( '' ),
				 'mode' => 'auto',
     ));

		 // Manual Grid
		 acf_register_block_type(array(
				 'name'              => 'mtm_block_grid_manual',
				 'title'             => __('Manual Grid Block'),
				 'description'       => __('Manually create content that will be displayed in a grid format'),
				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-grid-manual.php',
				 'category'          => 'custom-blocks',
				 'icon'              => 'grid-view',
				 'keywords'          => array( '' ),
				'mode' => 'auto',
		 ));

		// Content Grid
		 acf_register_block_type(array(
				 'name'              => 'mtm_block_grid_posts',
				 'title'             => __('Content Grid Block'),
				 'description'       => __('Select existing content that will be displayed in a gridt format'),
				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-grid-post.php',
				 'category'          => 'custom-blocks',
				 'icon'              => 'grid-view',
				 'keywords'          => array( '' ),
				'mode' => 'auto',
		 ));

		 // Hero Image
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_hero_image',
 				 'title'             => __('Hero Image Block'),
 				 'description'       => __('Display a background image with headline, text, and buttons'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-hero-image.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'camera',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Hero Media
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_hero_media',
 				 'title'             => __('Hero Video Block'),
 				 'description'       => __('Display an embedded video with headline, text, and buttons'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-hero-media.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'video-alt3',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Slider
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_slider',
 				 'title'             => __('Slider Block'),
 				 'description'       => __('Display a slider, where each slide has background image, headline, text, and link'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-slider.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'images-alt2',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Tabs
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_tabs',
 				 'title'             => __('Tabs Block'),
 				 'description'       => __('Display tabs that can stack to an accoridon on mobile'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-tabs.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'index-card',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Feature Boxes
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_feature_boxes',
 				 'title'             => __('Featured Content Block'),
 				 'description'       => __('Display featured content blocks manually or by selecting from existing content'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-featured-content.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'warning',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Gallery Grid
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_gallery',
 				 'title'             => __('Gallery Grid Block'),
 				 'description'       => __('Display a gallery where each image is the same size'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-gallery.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'images-alt',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Logo Showcase
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_logo_showcase',
 				 'title'             => __('Logo Showcase Block'),
 				 'description'       => __('Display a showcase of logo images with links'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-logos.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'star-filled',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Widget Area
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_widget_area',
 				 'title'             => __('Widget Area Block'),
 				 'description'       => __('Display one of your custom widget areas'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-widget-area.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'feedback',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // Widget Area
 		 acf_register_block_type(array(
 				 'name'              => 'mtm_block_jump_button',
 				 'title'             => __('Back To Top Block'),
 				 'description'       => __('Display a simple "back to top" button'),
 				 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-block-jump-button.php',
 				 'category'          => 'custom-blocks',
 				 'icon'              => 'arrow-up-alt',
 				 'keywords'          => array( '' ),
 				'mode' => 'auto',
 		 ));

		 // TEST ONLY
		 // acf_register_block_type(array(
			// 	 'name'              => 'mtm_block_test',
			// 	 'title'             => __('Test Block'),
			// 	 'description'       => __('Test block for dev only'),
			// 	 'render_template'   => MTM_BLOCK_PLUGIN_DIR . 'templates/mtm-wrapper-test.php',
			// 	 'category'          => 'custom-blocks',
			// 	 'icon'              => 'welcome-view-site',
			// 	 'keywords'          => array( '' ),
			// 	'mode' => 'auto',
		 // ));
 }

 // Check if function exists and hook into setup.
 if( function_exists('acf_register_block_type') ) {
     add_action('acf/init', 'register_acf_block_types');
 }



/**
* Original ACF field registration
* To be refactored as seen above
*/

if( function_exists('acf_add_local_field_group') ):

	// $mtm_field_groups = new Mtm_Field_Groups();

	// acf_add_local_field_group( $mtm_field_groups->mtm_content_modules() );

/** Background Image **/

acf_add_local_field_group(array(
	'key' => 'group_5b3f7572ce4f5BLOCK',
	'title' => 'Custom Block Settings',
	'fields' => array(
		array(
			'key' => 'field_5b3f7580fae80BLOCK',
			'label' => 'Include Stylesheets?',
			'name' => 'mtm_block_enqueue_stylesheets',
			'type' => 'true_false',
			'instructions' => 'Defaults to checked. If unchecked, you will need to include your own stylesheets in your theme.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Enqueue the stylesheets from this plugin?',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'page-components-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56831a6c39e46block',
	'title' => 'Background Image',
	'fields' => array(
		array(
			'key' => 'field_565cdb92e45d7block',
			'label' => 'Add Background Image',
			'name' => 'mtm_home_background_image',
			'type' => 'image',
			'instructions' => '(Optional) Add a background image to the homepage area',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'blocktemplates',
				'operator' => '==',
				'value' => '../templates/template-single-scroll.php',
			),
		),
	),
	'menu_order' => 100,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5e25c33217992',
	'title' => 'Button Options',
	'fields' => array(
		array(
			'key' => 'field_5e25c65cb3f33',
			'label' => 'Button Size',
			'name' => 'mtm_button_size',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Default',
				'button-sm' => 'Small',
				'button-lg' => 'Large',
				'button-xl' => 'X-Large',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e25c6c2b3f34',
			'label' => 'Button Alignment',
			'name' => 'mtm_button_alignment',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Default',
				'alignleft' => 'Left',
				'aligncenter' => 'Center',
				'alignright' => 'Right',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/mtm-block-buttons',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/mtm-block-call-to-action',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
