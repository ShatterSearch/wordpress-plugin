<?php

/**
 * Handles shortcodes
 *
 * @since      1.0.1
 * @package    Sports_Data
 * @subpackage Sports_Data/includes
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
	private $sports_data;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;




	public function __construct($sports_data, $version)
	{
		$this->sports_data = $sports_data;
		$this->version = $version;
	}

    public static function store_locator_shortcode(){
        $content = '<div id="ssRetailers"></div>';
        global $wpdb;

        return $content;
    }

    public static function states_shortcode(){
        $content = '<div id="ssStates"></div>';
        global $wpdb;

        return $content;
    }
    
    public static function drops_shortcode(){
        $content = '<div id="ssDrops"></div>';
        global $wpdb;

        return $content;
    }

    public static function photos_shortcode(){
        $content = '<div id="ssPhotos"></div>';
        global $wpdb;

        return $content;
    }
}
