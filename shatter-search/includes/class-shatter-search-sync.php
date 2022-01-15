<?php

/**
 * Handles syncing
 *
 * @since      1.0.1
 * @package    Shatter_Search
 * @subpackage Shatter_Search/includes
 * @author     Hypertext Media <nchandranatha@gmail.com>
 */
class Shatter_Search_Sync
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




	public function __construct($shatter_search, $version)
	{
		$this->shatter_search = $shatter_search;
		$this->version = $version;
	}

	public function reset_plugin_data(){
		global $wpdb;
		$options = [
			'ss_entity_type',
			'ss_api_key',
			'ss_secret_api_key',
			'ss_store_id',
			'ss_brand_id',
			'ss_store_name',
			'ss_brand_name',
			'ss_billing_status',
			'ss_updated_at',
		];
		foreach($options as $option){
			if(!empty(get_option($option))){
				delete_option($option);
			}
		}
		$tables = [
			$wpdb->prefix . 'ss_retailers',
			$wpdb->prefix . 'ss_drops',
			$wpdb->prefix . 'ss_drop_items',
		];
		foreach($tables as $table){
			$wpdb->query( "DROP TABLE IF EXISTS " . $table );

		}
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		require_once plugin_dir_path( __FILE__ ) . 'class-shatter-search-activator.php';
		Shatter_Search_Activator::createSchema();

		wp_redirect(admin_url('admin.php?page=manage-shatter-search-setup'));
		exit;
		return;
	}
    public function sync_plugin_data(){
		global $wpdb;
		
		$apiKey = get_option('ss_api_key');
		if(!empty($apiKey)){

			$url = 'https://shattersearch.com/api/v1/widget';

			$response = wp_remote_get( $url, array( 'headers' => [
				'authorization' => $apiKey
			]));

			if ( is_array( $response ) && ! is_wp_error( $response ) ) {

				$contents = $response['body'];

				$decode = json_decode($contents, true);

				$processedRetailerIDS = [];
				$processedDropIDS = [];
				$processedDropItemIDS = [];

				if(!empty($decode['drops'])){
					foreach($decode['drops'] as $state => $drops){
						foreach($drops['drops'] as $key => $drop){
							$processedDropIDS[] = $drop['drop_id'];
							$processedRetailerIDS[] = $drop['retailer_id'];
							if(!empty($drop['items'])){
								foreach($drop['items'] as $item){
									$processedDropItemIDS[] = $item['photo_id'];
								}
							}

							var_dump($drops);
							self::insertOrUpdateDrop($drop);
						}
					}
				}
				if(!empty($decode['retailers'])){
					foreach($decode['retailers'] as $state => $cities){
						foreach($cities as $key => $city){
							foreach($city['retailers'] as $retailer){
								if(!in_array($retailer['retailer_id'], $processedRetailerIDS)){
									self::insertOrUpdateRetailer($retailer);
								}
							}
						}
					}
				}

				update_option('ss_updated_at', time());
			}
		}
	}
	public static function insertOrUpdateRetailer($retailer){
		global $wpdb;

		$retailer_table_name = $wpdb->prefix . 'ss_retailers';
		$wpdb->replace($retailer_table_name, [
			'id' => $retailer['retailer_id'],
			'name' => $retailer['retailer_name'],
			'url' => '',
			'logo' => $retailer['logo'],
			'active' => 1,
			'address' => $retailer['address'],
			'city' => $retailer['city'],
			'state' => $retailer['state'],
			'zip' => $retailer['zip'],
			'phone' => $retailer['phone'],
		], [
			'%d',
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		]);
		return;
	}
    public static function insertOrUpdateDrop($drop){
		global $wpdb;
		$table_name = $wpdb->prefix . 'ss_drops';
		$wpdb->replace($table_name, [
			'id' => $drop['drop_id'],
			'name' => $drop['drop_name'],
			'retailer_id' => $drop['retailer_id'],
			'active' => 1,
		],[
			'%d',
			'%s',
			'%d',
			'%d',
		]);

		$retailer_table_name = $wpdb->prefix . 'ss_retailers';
		$wpdb->replace($retailer_table_name, [
			'id' => $drop['retailer_id'],
			'name' => $drop['retailer_name'],
			'url' => '',
			'logo' => $drop['logo'],
			'active' => 1,
			'address' => $drop['address'],
			'city' => $drop['city'],
			'state' => $drop['state'],
			'zip' => $drop['zip'],
			'phone' => $drop['phone'],
		], [
			'%d',
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		]);
		foreach($drop['items'] as $item){
			$drop_items_table_name = $wpdb->prefix . 'ss_drop_items';
			$wpdb->replace($drop_items_table_name, [
				'id' => $item['photo_id'],
				'strain' => $item['name'],
				'type' => $item['type'],
				'drop_id' => $drop['drop_id'],
				'image' => $item['photo'],
				'retailer_id' => $drop['retailer_id'],
			],[
				'%d',
				'%s',
				'%s',
				'%d',
				'%s',
				'%d'
			]);
		}
		return;
	}


}
