<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       __PLUGIN_URI__
 * @since      __PLUGIN_VERSION__
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/admin
 * @author     __PLUGIN_AUTHOR_FULL__
 */
class __PLUGIN_NAME___Admin
{
	/**
	 * The ID of this plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 * @var      string    $__PLUGIN_NAME__    The ID of this plugin.
	 */
	private $__PLUGIN_NAME__;

	/**
	 * The version of this plugin.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @param      string    $__PLUGIN_NAME__       The name of this plugin.
	 * @param      string    $version    		The version of this plugin.
	 */
	public function __construct($__PLUGIN_NAME__, $version)
	{
		$this->__PLUGIN_NAME__ = $__PLUGIN_NAME__;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function enqueue_styles()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in __PLUGIN_NAME___Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The __PLUGIN_NAME___Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style($this->__PLUGIN_NAME__, plugin_dir_url(__FILE__) . 'css/__PLUGIN_FILENAME__-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function enqueue_scripts()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in __PLUGIN_NAME___Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The __PLUGIN_NAME___Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script($this->__PLUGIN_NAME__, plugin_dir_url(__FILE__) . 'js/__PLUGIN_FILENAME__-admin.js', array('jquery'), $this->version, false);
	}
}
