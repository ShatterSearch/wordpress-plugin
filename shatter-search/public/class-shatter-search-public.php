<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://shattersearch.com
 * @since      1.0.0
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/public
 * @author     Naresh Chandranatha <nash@shattersearch.com>
 */
class Shatter_Search_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $shatter_search    The ID of this plugin.
	 */
	private $shatter_search;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $shatter_search       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $shatter_search, $version ) {

		$this->shatter_search = $shatter_search;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shatter_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shatter_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->shatter_search, plugin_dir_url( __FILE__ ) . 'css/shatter-search-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shatter_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shatter_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->shatter_search, plugin_dir_url( __FILE__ ) . 'js/shatter-search-public.js', array( 'jquery' ), $this->version, false );

	}

}
