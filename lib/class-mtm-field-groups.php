<?php
/**
 * Contains the default values for all modular field groups
 *
 * @package Mtm_Field_Definitions
 * @author Marktime Media
 **/
class Mtm_Block_Field_Groups extends Mtm_Block_Field_Definitions {

	/**
	* Label for Modular Boxes
	*/
	public static $str_label = 'Add Content Modules';

	/**
	* Array of Locations
	*/
	public static $arr_location = array(
		array(
			'param' => 'component',
			'operator' => '==',
			'value' => '../templates/template-modules.php',
		),
	);

	/**
	* Unique Key
	*/
	public static $str_key = 'group_56f5752dccdbf';


	public function __construct() {

		// add_action( 'init', array( $this, 'mtm_content_modules' ) );
	}

	/**
	* Register field group with ACF
	*/
	// public function mtm_content_modules( $label = null, array $location = null, $key = null ) {
	//
	// 	if( is_null( $label ) ) { $label = self::$str_label; }
	// 	if( is_null( $location ) ) { $location = self::$arr_location; }
	// 	if( is_null( $key ) ) { $key = self::$str_key; }
	//
	// 	return apply_filters( 'mtm_content_modules_filter', array(
	// 		'key' => $key,
	// 		'title' => 'Content Modules',
	// 		'fields' => array(
	// 			$this->mtm_module_show_page_title(),
	// 			array(
	// 				'key' => 'field_56f5778adcb85',
	// 				'label' => $label,
	// 				'name' => 'mtm_content_modules',
	// 				'type' => 'flexible_content',
	// 				'instructions' => '',
	// 				'required' => 0,
	// 				'conditional_logic' => 0,
	// 				'wrapper' => array(
	// 					'width' => '',
	// 					'class' => '',
	// 					'id' => '',
	// 				),
	// 				'button_label' => 'Add Content Area',
	// 				'min' => '',
	// 				'max' => '',
	// 				'layouts' => apply_filters( 'mtm_content_modules_layouts_filter', array(
	// 					'mtm_module_single_content_area' => $this->mtm_module_single_content_area(),
	// 					'mtm_module_dual_content_area' => $this->mtm_module_dual_content_area(),
	// 					'mtm_module_content_callout' => $this->mtm_module_content_callout(),
	// 					'mtm_module_hero_image' => $this->mtm_module_hero_image(),
	// 					'mtm_module_hero_media' => $this->mtm_module_hero_media(),
	// 					'mtm_module_slider' => $this->mtm_module_slider(),
	// 					'mtm_module_feature_boxes' => $this->mtm_module_feature_boxes(),
	// 					'mtm_module_call_to_action' => $this->mtm_module_call_to_action(),
	// 					'mtm_module_logo_showcase' => $this->mtm_module_logo_showcase(),
	// 					'mtm_module_widget_area' => $this->mtm_module_widget_area(),
	// 					'mtm_module_listgrid' => $this->mtm_module_listgrid(),
	// 					'mtm_module_gridlist' => $this->mtm_module_gridlist(),
	// 					'mtm_module_listgrid_posts' => $this->mtm_module_listgrid_posts(),
	// 					'mtm_module_gridlist_posts' => $this->mtm_module_gridlist_posts(),
	// 					'mtm_module_tabs' => $this->mtm_module_tabs(),
	// 					'mtm_module_gallery' => $this->mtm_module_gallery(),
	// 				), $location ),
	// 			),
	// 		),
	// 		'location' => array( $location ),
	// 		'menu_order' => 0,
	// 		'position' => 'normal',
	// 		'style' => 'seamless',
	// 		'label_placement' => 'top',
	// 		'instruction_placement' => 'label',
	// 		'hide_on_screen' => array(
	// 			0 => 'the_content',
	// 		),
	// 		'active' => 1,
	// 		'description' => '',
	// 	));
	// }
} // END class

new Mtm_Block_Field_Groups();
