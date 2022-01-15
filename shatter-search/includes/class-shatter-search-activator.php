<?php

/**
 * Fired during plugin activation
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
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 * @author     Naresh Chandranatha <nash@shattersearch.com>
 */
class Shatter_Search_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		$retailers = $wpdb->base_prefix . "ss_retailers";
		$retailers_sql = "CREATE TABLE $retailers (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NULL,
			`url` VARCHAR(255) NULL,
			`logo` VARCHAR(255) NULL,
			`active` INT(1) NULL DEFAULT '0',
			`address` VARCHAR(255) NULL,
			`city` VARCHAR(50) NULL,
			`state` VARCHAR(50) NULL,
			`zip` INT(5) NULL,
			`phone` VARCHAR(50) NULL,
			PRIMARY KEY (id)
		) $charset_collate;";
		dbDelta($retailers_sql);


		$drops = $wpdb->base_prefix . "ss_drops";
		$drops_sql = "CREATE TABLE $drops (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NULL,
			`created_at` TIMESTAMP NULL,
			`retailer_id` VARCHAR(255) NULL,
			`active` INT(1) NULL DEFAULT '0',
			PRIMARY KEY (id)
		) $charset_collate;";
		dbDelta($drops_sql);

		$drop_items = $wpdb->base_prefix . "ss_drop_items";
		$drop_items_sql = "CREATE TABLE $drop_items (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`drop_id` INT(11) NULL,
			`strain` VARCHAR(255) NULL,
			`type` VARCHAR(255) NULL,
			`image` VARCHAR(255) NULL,
			`retailer_id` VARCHAR(255) NULL,
			PRIMARY KEY (id)
		) $charset_collate;";
		dbDelta($drop_items_sql);

		update_option('ss_version', SHATTER_SEARCH_VERSION);

		if ( ! wp_next_scheduled( 'shatter_search_sync_data' ) ) {
			wp_schedule_event( time(), 'hourly', 'shatter_search_sync_data' ); // plugin_cron_refresh_cache is a hook
	   	}
	}

}
