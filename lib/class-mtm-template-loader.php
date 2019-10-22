<?php

/**
 * Template loader for Mtm Component Plugin.
 *
 * Only need to specify class properties here.
 *
 */
class Mtm_Block_Template_Loader extends Gamajo_Block_Template_Loader {

	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = 'mtm';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = 'mtm-templates';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = MTM_BLOCK_PLUGIN_DIR;

}
