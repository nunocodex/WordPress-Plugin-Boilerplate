<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       __PLUGIN_URI__
 * @since      __PLUGIN_VERSION__
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      __PLUGIN_VERSION__
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 * @author     __PLUGIN_AUTHOR_FULL__
 */
class __PLUGIN_NAME__
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   protected
	 * @var      __PLUGIN_NAME___Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   protected
	 * @var      string    $__PLUGIN_NAME__    The string used to uniquely identify this plugin.
	 */
	protected $__PLUGIN_NAME__;

	/**
	 * The current version of the plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function __construct()
	{
		if (defined('__PLUGIN_NAME___VERSION')) {
			$this->version = __PLUGIN_NAME___VERSION;
		} else {
			$this->version = '__PLUGIN_VERSION__';
		}

		$this->__PLUGIN_NAME__ = '__PLUGIN_SLUG__';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - __PLUGIN_NAME___Loader. Orchestrates the hooks of the plugin.
	 * - __PLUGIN_NAME___i18n. Defines internationalization functionality.
	 * - __PLUGIN_NAME___Admin. Defines all hooks for the admin area.
	 * - __PLUGIN_NAME___Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 */
	private function load_dependencies()
	{
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-__PLUGIN_FILENAME__-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-__PLUGIN_FILENAME__-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-__PLUGIN_FILENAME__-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-__PLUGIN_FILENAME__-public.php';

		$this->loader = new __PLUGIN_NAME___Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the __PLUGIN_NAME___i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 */
	private function set_locale()
	{
		$plugin_i18n = new __PLUGIN_NAME___i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 */
	private function define_admin_hooks()
	{
		$plugin_admin = new __PLUGIN_NAME___Admin($this->get___PLUGIN_NAME__(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 */
	private function define_public_hooks()
	{
		$plugin_public = new __PLUGIN_NAME___Public($this->get___PLUGIN_NAME__(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     __PLUGIN_VERSION__
	 * @return    string    The name of the plugin.
	 */
	public function get___PLUGIN_NAME__()
	{
		return $this->__PLUGIN_NAME__;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     __PLUGIN_VERSION__
	 * @return    __PLUGIN_NAME___Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     __PLUGIN_VERSION__
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
