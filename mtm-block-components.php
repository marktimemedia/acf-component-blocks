<?php
/*
	Plugin Name: ACF Block Components
	Description: Custom Blocks and Block Page Templates
	Author: Marktime Media
	Version: 1.5.3
	Author URI: http://www.marktimemedia.com
 */

define( 'MTM_BLOCK_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-mtm-field-definitions.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-mtm-field-groups.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-acf-fields.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-mtm-block-template.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-mtm-template-loader.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/class-tgm-plugin-activation.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-acf-check-functions.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-acf-plugin-templates.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-acf-plugin-requirements.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-helpers.php' );
require_once( MTM_BLOCK_PLUGIN_DIR . 'lib/mtm-config.php' );


// Plugin Scripts
function mtm_block_components_load_scripts() {
    wp_enqueue_script( 'mtm-tabs', plugins_url( 'assets/js/mtm-tabs.js', __FILE__), array( 'jquery' ) );
    wp_enqueue_script( 'back-to-top', plugins_url( 'assets/js/back-to-top.js', __FILE__), array( 'jquery' ) );
    wp_enqueue_script( 'smooth-scroll-mtm', plugins_url( 'assets/js/smooth-scroll-mtm.js', __FILE__), array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'mtm_block_components_load_scripts' );

// Plugin Styles
function mtm_block_components_load_styles() {
	wp_enqueue_style( 'mtm-style', plugins_url( 'mtm-style.css', __FILE__) );
}

if( get_field( 'mtm_block_enqueue_stylesheets', 'option' ) ) {
	add_action( 'wp_enqueue_scripts', 'mtm_block_components_load_styles' );
}

// Plugin Styles in admin
function mtm_block_components_load_styles_in_admin() {
  wp_enqueue_style( 'mtm-editor-style', plugins_url( 'mtm-style.css', __FILE__) ); // enqueue style sheet
}

if( get_field( 'mtm_block_enqueue_stylesheets', 'option' ) ) {
	add_action( 'enqueue_block_editor_assets', 'mtm_block_components_load_styles_in_admin',10,0 );
}

// Admin Scripts
function mtm_block_components_admin_scripts() {
    wp_enqueue_style( 'mtm-admin-style', plugins_url( 'assets/css/mtm-admin-style.css', __FILE__) ); // enqueue style sheet
    wp_enqueue_script( 'mtm-tabs', plugins_url( 'assets/js/mtm-tabs.js', __FILE__), array( 'jquery' ) );
}
add_action( 'enqueue_block_editor_assets', 'mtm_block_components_admin_scripts',10,0 );

// Add Templates
add_action( 'plugins_loaded', array( 'Mtm_Block_Templates', 'get_instance' ) );

?>
