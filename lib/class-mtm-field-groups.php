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
	public static $str_label = 'Add Blocks';

	/**
	* Array of Locations
	*/
	public static $arr_location = array(
		array(
			'param' => 'blocktemplates',
			'operator' => '==',
			'value' => '../templates/template-block-content.php',
		),
	);

	/**
	* Unique Key
	*/
	public static $str_key = 'group_56f5752dccdbfblock';


	public function __construct() {

		add_action( 'init', array( $this, 'mtm_template_block_content' ) );
	}

	/**
	* Register field group with ACF
	*/
	public function mtm_template_block_content( $label = null, array $location = null, $key = null ) {

		if( is_null( $label ) ) { $label = self::$str_label; }
		if( is_null( $location ) ) { $location = self::$arr_location; }
		if( is_null( $key ) ) { $key = self::$str_key; }

		return apply_filters( 'mtm_template_block_content', array(
			'key' => $key,
			'title' => 'Content Modules',
			'fields' => array(
				$this->mtm_block_show_page_title(),
			),
			'location' => array( $location ),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
	}
} // END class

new Mtm_Block_Field_Groups();
