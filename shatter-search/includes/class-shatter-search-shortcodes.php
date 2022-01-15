<?php

/**
 * Handles shortcodes
 *
 * @since      1.0.1
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 * @author     Hypertext Media <nchandranatha@gmail.com>
 */
class Shatter_Search_Shortcodes
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $shatter_search    The ID of this plugin.
	 */
	private $shatter_search;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;



	private $processedRetailerIDS = [];
	private $processedDropIDS = [];
	private $processedDropItemIDS = [];




	public function __construct($shatter_search, $version)
	{
		$this->shatter_search = $shatter_search;
		$this->version = $version;
	}

    public static function store_locator_shortcode(){
        global $wpdb;
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/shatter-search-retailers-shortcode.php';
        return store_locator_shortcode();
    }

    public static function states_shortcode(){
		global $wpdb;
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/shatter-search-states-shortcode.php';
        return states_shortcode();
    }
	

    public static function drops_shortcode(){
        global $wpdb;
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/shatter-search-drops-shortcode.php';
        return drops_shortcode();
    }

    public static function photos_shortcode($atts = []){
		$attributes = shortcode_atts(
			array(
				'num_photos' => '4',
			), $atts
		);
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/shatter-search-photos-shortcode.php';
		return photo_shortcode($attributes);
    }
}
