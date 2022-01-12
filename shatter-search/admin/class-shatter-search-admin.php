<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://shattersearch.com
 * @since      1.0.0
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/admin
 * @author     Naresh Chandranatha <nash@shattersearch.com>
 */
class Shatter_Search_Admin {

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
	 * @param      string    $shatter_search       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $shatter_search, $version ) {

		$this->shatter_search = $shatter_search;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->shatter_search, plugin_dir_url( __FILE__ ) . 'css/shatter-search-admin.css', array(), $this->version, 'all' );

	}


	/**
	 * Register the admin menu option
	 *
	 * @since    1.0.0
	 */
	public function shatter_search_menu()
	{
		add_menu_page(
			'Shatter Search Options',
			'Shatter Search',
			'manage_options',
			'manage-shatter-search-options',
			array($this, 'shatter_search_options'),
			'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTQ0LjMxbW0iIGhlaWdodD0iMTI2LjgybW0iIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDE0NC4zMSAxMjYuODIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogPG1ldGFkYXRhPgogIDxyZGY6UkRGPgogICA8Y2M6V29yayByZGY6YWJvdXQ9IiI+CiAgICA8ZGM6Zm9ybWF0PmltYWdlL3N2Zyt4bWw8L2RjOmZvcm1hdD4KICAgIDxkYzp0eXBlIHJkZjpyZXNvdXJjZT0iaHR0cDovL3B1cmwub3JnL2RjL2RjbWl0eXBlL1N0aWxsSW1hZ2UiLz4KICAgIDxkYzp0aXRsZS8+CiAgIDwvY2M6V29yaz4KICA8L3JkZjpSREY+CiA8L21ldGFkYXRhPgogPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTg0LjMyOCAxMTAuMjgpIj4KICA8cGF0aCBkPSJtMTU2LjQ4LTExMC4yOGMtMzkuODUgMmUtNCAtNzIuMTU1IDMyLjMwNS03Mi4xNTUgNzIuMTU2IDVlLTUgMjAuOTk5IDkuMTQ4IDQwLjk1NiAyNS4wNTYgNTQuNjYzLTEuMTgwMS00LjczMzQtMS44NjgzLTkuMDM0NC0xLjg2ODEtMTEuMzk0di0xOS4wMDhjMC05LjM4MjYtMC4yNTkxLTE4LjM2NS0wLjIxODEtMjcuNjg3IDAtOC40MjY2IDI1LjczOC0xNC41OTEgNTcuMjg4LTE0LjYyOWgwLjI1MzdjMzAuNzE4IDAgNTYuNTgzIDYuMTczIDU2LjYyMSAxMy42OTdsMC40ODQzIDM0LjcwM2M0LjQwODQtOS41MDk1IDYuNjkyLTE5Ljg2NSA2LjY5MjEtMzAuMzQ3IDdlLTUgLTM5Ljg1MS0zMi4zMDUtNzIuMTU2LTcyLjE1Ni03Mi4xNTZ6bTguMTMzNCA1OS4xNzJjLTI0LjY5IDhlLTUgLTQ5LjM4MyA3LjAwNjUtNTEuNDYyIDkuOTUyNGwtMC4wMTcgNC40MDhjNi4xMDc3LTIuOTI1NCAxNC4wMjMtNS4zMTcyIDIzLjEzOC02Ljk1MTUgMC40Nzk2IDAuMzY3NDggMC44NTk5IDAuODI4NDQgMS4wMTAzIDEuNDA3MiAwLjMzMzcgMS4yODM2LTAuNTgwNSAyLjY5ODQtMS41NzU2IDMuNzkxLTYuMjg2NCAxLjE1NDQtMTIuMDAxIDIuNjcyNy0xNi45MzMgNC40ODI5IDEwLjIwOSAyLjY0MzMgMzEuOTM2IDQuNzczNiA0NS43MDEgNC40ODI0IDE3Ljc1MiAwLjIzNDc5IDM0LjU4Ni0yLjcyMTQgNDMuMzU0LTUuNTMyLTUuMjQxNi0xLjY5MTYtMTEuMjI0LTMuMDc3LTE3LjczNS00LjA4MzUtMS4wMjg3LTAuODMyLTEuOTA4OC0xLjkwOTctMS42OTUtMy4wODE1IDAuMjI3Ni0xLjI0NzcgMS40NDQ2LTEuNzEzOSAyLjcwMjctMS44NTYyIDguNzgxOSAxLjQyMTkgMTYuNTQgMy41MzQ4IDIyLjc2NiA2LjE1IDAuMTYxNS0wLjE5MzU0IDAuMjQ3MS0wLjM3NzU2IDAuMjQ2NS0wLjU0ODc5bC0wLjAxMS0zLjI1MmMwLTAuOTU0ODMtMS4xMDA0LTEuNDIxOC0xLjg3MzgtMS43NjY4LTUuNjE3MS0yLjUwNTMtMjMuNjU5LTcuNjAxNi00Ny4zOS03LjYwMTZoLTAuMjI0NHptNTEuNDU4IDE5LjQyNGMtMTEuNDQ2IDQuNjg4LTMwLjgzMiA3LjUwOS01MS42MDYgNy41MDkxLTIwLjY5LTEuOWUtNCAtNDAuMDA5LTIuNzk4Ni01MS40NzQtNy40NTU5bDAuMDc0IDUuMjY4OWM1LjgzMTQgMi4wOTIzIDE1LjQ5OCA0LjQzMzIgMjguNzc2IDUuNjg1NCAwIDAgMi41OTQ1IDAuNzMwMzEgMi40MzM1IDIuODUzNi0wLjE1NDkgMi4wNDIzLTIuODYyNCAxLjkzMDEtMi44NjI0IDEuOTMwMS0xMS4yNzctMS4wNzg2LTIwLjk1Ni0zLjA2MzYtMjguNDIyLTUuNDc0NmwwLjE5MTcgNC45NzMzYzAuODc4NCAxLjMxNjYgMjQuNjk3IDcuMTk5NSA1MS4yODMgNy4xOTk2IDI3LjE4NSAwIDQwLjI4OC0yLjUzNjMgNTEuNTctNy41MjM2bDAuMDM2LTQuNDU4NmMtNS40MDU2IDEuNjk1LTExLjExMSAzLjMxMTItMTguNzA0IDQuNjIzIDAgMC0zLjI4MTQgMC40NjQtMy41MzMxLTIuMzE1MS0wLjE4MDItMS45ODk5IDMuMTc2MS0yLjM3OTIgMy4xNzYxLTIuMzc5MiAxNi4xNS0zLjUyNTUgMTYuODQzLTQuNDA3IDE5LjI3LTUuNTA3MXptMCAyMC41MmMtMTEuNDQ2IDQuNjg4LTMwLjgzMiA3LjUwOS01MS42MDYgNy41MDkxLTIwLjY4OS0zZS01IC00MC4wMDgtMi43OTg0LTUxLjQ3NC03LjQ1NTRsMC4wODEgMTIuNzQ0YzEuMjcyMiAwLjUwNTk2IDMuNTk0MSAwLjY0MDE2IDYuNDM1MiAwLjYxNTk3bDEyLjIzMi0zLjk5NjcgMS4xNDIxIDMuNDk0OWMzLjcxNzEtMC4xMDgxMSA3LjI2OTQtMC4wODQxIDEwLjAwMyAwLjMzODk5IDUuNzI2OCAwLjg4NjMgOS41OTU0IDIuOTEwNCAxMy4xMDQgNC43MzYxbDUuNjY3NC0zLjE4MzggMy43MjA3IDYuNjIzOWMxLjc2MTEgMC4xOTg0MSAzLjcwMzIgMC4xMzQ4NSA1Ljk1MzEtMC4zMDQ5MSAxMS43NjQtMi4yOTkzIDEzLjczNyA0LjI3NyAxOS4yMzUgNS4xMTc1bDEuMjQ1OS01Ljk5MDggOC43MjY2IDIuNjk4NWM1LjQ2NTktNC4yNTU5IDMuNzMzNy0xMS4xNjkgMTUuNjIyLTE0LjQwNXoiIGZpbGw9IiNmZmYiLz4KIDwvZz4KPC9zdmc+Cg==',
		);
		
		add_submenu_page(
			'manage-shatter-search-options',
			'Initial Setup',
			'Initial Setup',
			'manage_options',
			'manage-shatter-search-initial-setup',
			array($this, 'shatter_search_setup'),
		);
	}
	
	/**
	 * Serve the Shatter Search options page
	 *
	 * @since    1.0.0
	 */
	public function shatter_search_options()
	{
		require_once plugin_dir_path( __FILE__ ) . 'tpl/shatter-search-admin-display.php';
		
		
	}
	

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->shatter_search, plugin_dir_url( __FILE__ ) . 'js/shatter-search-admin.js', array( 'jquery' ), $this->version, false );

	}

}
