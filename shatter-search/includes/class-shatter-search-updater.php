<?php

/**
 * Fired during plugin updating
 *
 * @link       https://shattersearch.com
 * @since      1.0.0
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin updating.
 *
 * @since      1.0.0
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 * @author     Naresh Chandranatha <nash@shattersearch.com>
 */
class Shatter_Search_Updater {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function update($oldVersion, $newVersion) {
		if($oldVersion === '1.0.0' && $newVersion === '1.0.1') {
			$this->updateOne();
		}
	}
	public function updateOne(){
		print 'updating!';
		die();
	}
}
