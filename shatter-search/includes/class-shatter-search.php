<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://shattersearch.com
 * @since      1.0.0
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
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
 * @since      1.0.0
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 * @author     Naresh Chandranatha <nash@shattersearch.com>
 */
class Shatter_Search {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Shatter_Search_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;


	/**
	 * The updater that's responsible for updating the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      SHATTER_SEARCH_UPDATER    $updater    Maintains database operations during plugin updates
	 */
	protected $updater;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $shatter_search    The string used to uniquely identify this plugin.
	 */
	protected $shatter_search;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;


	public $cache_key;
	public $cache_allowed;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SHATTER_SEARCH_VERSION' ) ) {
			$this->version = SHATTER_SEARCH_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->shatter_search = 'shatter-search';

		$this->cache_key = 'shatter_search';
		$this->cache_allowed = false;

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		add_action('shatter_search_reset_plugin', array('SHATTER_SEARCH_SYNC', 'reset_plugin_data'));
		add_action('shatter_search_sync_data', array('SHATTER_SEARCH_SYNC', 'sync_plugin_data'));
		add_action('plugins_loaded', array($this, 'check_shatter_search_version'));	
	}

	public function insert_bubble_footer(){
		$config = [
			'pluginVersion' => $this->version,
			'apiKey' => (!empty(get_option('ss_api_key')) ? get_option('ss_api_key') : ''),
			'selfHosted' => (!empty(get_option('ss_self_hosted')) ? get_option('ss_self_hosted') : 'false'),
		];
		if(!empty($config['apiKey'])){
			echo '<div id="ssAPIKey" style="display: none;" data-version="' . $config['pluginVersion'] . '"  data-key="' . $config['apiKey'] . '" data-self-hosted="' . $config['selfHosted'] . '"></div>';
		}
		return;
	}

	public function check_shatter_search_version(){
		$currentVersion = get_option('ss_version');
		if(empty($currentVersion)){
			update_option('ss_version', $this->version);
		}else if (SHATTER_SEARCH_VERSION !== $currentVersion) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-shatter-search-updater.php';
			$this->updater = new Shatter_Search_Updater();
			$this->updater->update(SHATTER_SEARCH_VERSION, $this->version);
			update_option('ss_version', $this->version);
		}
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Shatter_Search_Loader. Orchestrates the hooks of the plugin.
	 * - Shatter_Search_i18n. Defines internationalization functionality.
	 * - Shatter_Search_Admin. Defines all hooks for the admin area.
	 * - Shatter_Search_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-shatter-search-loader.php';


		/**
		 * The class responsible for defining all shortcodes used in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-shatter-search-shortcodes.php';



		/**
		 * The class responsible for sync 
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-shatter-search-sync.php';

		
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-shatter-search-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-shatter-search-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-shatter-search-public.php';

		$this->loader = new Shatter_Search_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Shatter_Search_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Shatter_Search_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Shatter_Search_Admin( $this->get_shatter_search(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'shatter_search_menu' );
		$this->loader->add_action( 'admin_post_initial_setup', $plugin_admin, 'admin_post_initial_setup' );
		$this->loader->add_action( 'admin_post_manual_sync', $plugin_admin, 'admin_post_manual_sync' );
		$this->loader->add_action( 'admin_post_reset_plugin', $plugin_admin, 'admin_post_reset_plugin' );
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Shatter_Search_Public( $this->get_shatter_search(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action('wp_footer', $this, 'insert_bubble_footer');

		add_shortcode('ss-retailers', array('Shatter_Search_Shortcodes', 'store_locator_shortcode'));
		add_shortcode('ss-states', array('Shatter_Search_Shortcodes', 'states_shortcode'));
		add_shortcode('ss-drops', array('Shatter_Search_Shortcodes', 'drops_shortcode'));
		add_shortcode('ss-photos', array('Shatter_Search_Shortcodes', 'photos_shortcode'));
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_shatter_search() {
		return $this->shatter_search;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Shatter_Search_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	
}
