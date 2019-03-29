<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       __PLUGIN_URI__
 * @since      __PLUGIN_VERSION__
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      __PLUGIN_VERSION__
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 * @author     __PLUGIN_AUTHOR_FULL__
 */
class __PLUGIN_NAME___i18n
{
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function load_plugin_textdomain()
	{
		load_plugin_textdomain(
			'__PLUGIN_SLUG__',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
