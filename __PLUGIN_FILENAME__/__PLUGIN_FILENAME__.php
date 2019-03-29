<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              __PLUGIN_URI__
 * @since             __PLUGIN_VERSION__
 * @package           __PLUGIN_NAME__
 *
 * @wordpress-plugin
 * Plugin Name:       ____PLUGIN_NAME____
 * Plugin URI:        __PLUGIN_URI__
 * Description:       __PLUGIN_DESCRIPTION__
 * Version:           __PLUGIN_VERSION__
 * Author:            __PLUGIN_AUTHOR_NAME__
 * Author URI:        __PLUGIN_AUTHOR_URI__
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       __PLUGIN_SLUG__
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version __PLUGIN_VERSION__ and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('__PLUGIN_NAME___VERSION', '__PLUGIN_VERSION__');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-__PLUGIN_FILENAME__-activator.php
 */
function activate___PLUGIN_NAME__()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-__PLUGIN_FILENAME__-activator.php';
	__PLUGIN_NAME___Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-__PLUGIN_FILENAME__-deactivator.php
 */
function deactivate___PLUGIN_NAME__()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-__PLUGIN_FILENAME__-deactivator.php';
	__PLUGIN_NAME___Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate___PLUGIN_NAME__');
register_deactivation_hook(__FILE__, 'deactivate___PLUGIN_NAME__');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-__PLUGIN_FILENAME__.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    __PLUGIN_VERSION__
 */
function run___PLUGIN_NAME__()
{
	$plugin = new __PLUGIN_NAME__();
	$plugin->run();
}

run___PLUGIN_NAME__();
