<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       __PLUGIN_URI__
 * @since      __PLUGIN_VERSION__
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    __PLUGIN_NAME__
 * @subpackage __PLUGIN_NAME__/includes
 * @author     __PLUGIN_AUTHOR_FULL__
 */
class __PLUGIN_NAME___Loader
{

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions = [];
    
    /**
     * The array of filters registered with WordPress.
     *
     * @since    __PLUGIN_VERSION__
     * @access   protected
     * @var      array    $filters    The filters registered with WordPress to fire when the plugin loads.
     */
    protected $filters = [];
    
    /**
     * The array of shortcodes registered with WordPress.
     *
     * @since    __PLUGIN_VERSION__
     * @access   protected
     * @var      array    $shortcodes    The shortcodes registered with WordPress to fire when the plugin loads.
     */
    protected $shortcodes = [];

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function __construct()
	{
	
	}
    
    /**
     * @param object|string|null $component
     * @param string|callable $callback
     * @return array|string|callable
     */
	protected function parse_callback($component, $callback)
    {
        return (null === $component) ? $callback : [$component, $callback];
    }

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @param    string               $hook             The name of the WordPress action that is being registered.
	 * @param    object|string|null   $component        A reference to the instance of the object on which the action is defined.
	 * @param    string|callable      $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1)
	{
		$this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object|string|null   $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string|callable      $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1)
	{
		$this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    __PLUGIN_VERSION__
	 * @access   private
	 * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object|string|null   $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string|callable      $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         The priority at which the function should be fired.
	 * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function add($hooks, $hook, $component, $callback, $priority, $accepted_args)
	{
		$hooks[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		];

		return $hooks;
	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    __PLUGIN_VERSION__
	 */
	public function run()
	{
		foreach ($this->filters as $filter) {
			add_filter($filter['hook'], $this->parse_callback($filter['component'], $filter['callback']), $filter['priority'], $filter['accepted_args']);
		}

		foreach ($this->actions as $action) {
			add_action($action['hook'], $this->parse_callback($action['component'], $action['callback']), $action['priority'], $action['accepted_args']);
		}
		
		foreach ($this->shortcodes as $shortcode) {
		    add_shortcode($shortcode['hook'], $this->parse_callback($shortcode['component'], $shortcode['callback']));
        }
	}
}
