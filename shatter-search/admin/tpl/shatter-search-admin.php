<?php
global $wpdb;

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shattersearch.com
 * @since      1.0.0
 *
 * @package    Shatter_Search
 * @subpackage Shatter_Search/admin/tpl
 */
// get wordpress option

$stats = [];

$stats['entity_type'] = $entityType = get_option('ss_entity_type');
if(empty($entityType) || (!in_array($entityType, ['brand', 'store']))){
    update_option('ss_api_key', '');
    update_option('ss_secret_api_key', '');
    update_option('ss_entity_type', '');
    wp_redirect(admin_url('admin.php?page=manage-shatter-search-setup'));
}elseif(!empty($entityType) && $entityType === 'brand'){
    $stats['brand_name'] = get_option('ss_brand_name');
    $stats['brand_id'] = get_option('ss_brand_id');
    
    $retailersTableName = $wpdb->base_prefix . "ss_retailers";
    $retailersCount = $wpdb->get_var("SELECT COUNT(id) FROM $retailersTableName");
    $stats['retailers_count'] = $retailersCount;
}elseif(!empty($entityType) && $entityType === 'store'){
    $stats['store_name'] = get_option('ss_store_name');
    $stats['store_id'] = get_option('ss_store_id');
}
$stats['sync_time'] = get_option('ss_updated_at');
if(!empty($stats['sync_time'])){
    $stats['sync_time'] = date("F j, Y, g:i a", $stats['sync_time']);
}


$dropsTableName = $wpdb->base_prefix . "ss_drops";
$dropsCount = $wpdb->get_var("SELECT COUNT(id) FROM $dropsTableName");
$stats['drops_count'] = $dropsCount;

$stats['billing_status'] = get_option('ss_billing_status');
function left(){
    return '
        <ul class="ss-links">
            <li class="purple">
                <a
                    href="https://shattersearch.com"
                    target="_blank"
                    class="ss-bold"
                >
                    <span>
                        <i class="fas fa-external-link-alt fa-fw"></i>
                    </span>
                    ShatterSearch.com
                </a>
            </li>
            <li>
                <a
                    href="https://biz.shattersearch.com/software-for-cannabis-extract-brands"
                    target="_blank"
                >
                    <span>
                        <i class="fas fa-flask fa-fw"></i>
                    </span>
                    For Extract Brands
                </a>
            </li>

            <li>
                <a
                    href="https://biz.shattersearch.com/software-for-dispensaries"
                    target="_blank"
                >
                    <span>
                        <i class="fas fa-shopping-cart fa-fw"></i>
                    </span>
                    For Dispensaries
                </a>
            </li>

            <li class="ss-mt-2">
                <a
                    href="https://shattersearch.com/support"
                    target="_blank"
                >
                    <span>
                        <i class="fas fa-life-ring fa-fw"></i>
                    </span>
                    Support Center
                </a>
            </li>
        </ul>
    ';
}
function right($stats){
    return '
        <div class="ss-card faded ">
            <h3>Welcome!</h3>
            <div class="ss-px-4 ss-mt-2">
                <p class="">You\'ve successfully installed the Shatter Search plugin! We hope you find this useful and easy to use.</p>
            
                <p class="ss-mt-2">
                    Please reach out to us through the <a href="https://shattersearch.com/support">Support Center</a> or email help@shattersearch.com if you require any assistance.
                </p>
                <div id="ssNews" class="ss-d-none ss-news ss-mt-3">
                    <b>Latest News</b>:
                    <a class="ss-d-block ss-mt-2" id="ssNewsLink" href=""></a>
                    <p class="ss-mb-2 ss-mt-2" id="ssNewsBody"></p>
                    <a id="ssNewsLink2" href="">Read More &nbsp;<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="ss-card ss-mt-3 faded ">
            <h3>Managing Your Retailers &amp; Drops</h3>
            <div class="ss-px-4 ss-mt-3">
                <ul class="ss-w-100 ss-w-lg-75 ">
                    <li class="ss-mb-0">
                        <a class="ss-link-unstyled" href="https://shattersearch.com/biz">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Business Control Panel</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Visit ShatterSearch.com to manage your retailers and product drops. 
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ss-card ss-mt-3 faded ">
            <h3>Adding The Shortcodes</h3>
            <div class="ss-px-4 ss-mt-3">
                <p>
                    Next, you\'ll need to add shortcodes to your pages that will display your store locator, product drops, and product photos.
                </p>
                <p class=" ss-mt-1">
                    Click one of the shortcodes below to get started:
                </p>
                <ul class="ss-w-100 ss-w-lg-75 ss-mt-3">
                    <li>
                        <a class="ss-link-unstyled" href="' . admin_url('admin.php?page=manage-shatter-search-store-locator') . '">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Store Locator</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Add our enhanced store locator to your website to direct customers to stores that carry your products
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="ss-link-unstyled" href="' . admin_url('admin.php?page=manage-shatter-search-product-drops') . '">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Product Drops</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Build hype around your product drops and drive sales at your retailers
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="ss-mb-0">
                        <a class="ss-link-unstyled" href="' . admin_url('admin.php?page=manage-shatter-search-product-photos') . '">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Product Photos</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Show off photos of recent extracts you\'ve produced
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ss-card ss-mt-3 faded ">
            <h3>Configure The Bubble</h3>
            <div class="ss-px-4 ss-mt-3">
                <ul class="ss-w-100 ss-w-lg-75 ">
                    <li class="ss-mb-0">
                        <a class="ss-link-unstyled" href="' . admin_url('admin.php?page=manage-shatter-search-bubble') . '">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Configure Bubble</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    The bubble puts your retailers and product drops in a "bubble" on your website 
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ss-card ss-mt-3 faded">
            <h3>Internal Database</h3>
            <div class="ss-px-4 ss-mt-2">
                <p class="">This plugin maintains a list of your retailers and product drops.  This information is pulled from Shatter Search servers once an hour.</p>
                <div class="ss-table">
                    <div>Last Updated:</div>
                    <div>' . $stats['sync_time']. '</div>
                </div>
                <div class="ss-table">
                    <div>API Status:</div>
                    <div>' . ucwords($stats['billing_status']) . '</div>
                </div>
                <div class="ss-table">
                    <div>Account Type:</div>
                    <div>' . ucwords($stats['entity_type']) . '</div>
                </div>
    ' .
            ($stats['entity_type'] === 'brand' ?
                '<div class="ss-table">
                    <div>Brand:</div>
                    <div>' . $stats['brand_name'] . ' (' . $stats['brand_id'] . ')</div>
                </div>
                <div class="ss-table">
                    <div>Retailers:</div>
                    <div>' . $stats['retailers_count'] . '</div>
                </div>'
            :
                '<div class="ss-table">
                    <div>Store:</div>
                    <div>' . $stats['store_name'] . ' (' . $stats['store_id'] . ')</div>
                </div>'
            ) .
    '
                
                <div class="ss-table">
                    <div>Drops:</div>
                    <div>' . $stats['drops_count'] . '</div>
                </div>

                <form style="border:none; box-shadow:none;" action="' . admin_url('admin-post.php') . '" method="post">
                    <input type="hidden" name="action" value="manual_sync">
                    <button
                        type="submit"
                        class="button button-purple"
                    >
                        Manually Sync Data
                    </button> 
                </form>

                <div class="ss-mt-3">
                    <p><b>Having Problems?</b> Try resetting the plugin by clicking the button below.</p>
                    <p>Warning: This will clear all plugin settings and the plugin\'s database. You\'ll need to re-enter your API keys.</p>
                </div>
                <form id="resetPlugin" style="border:none; box-shadow:none;" action="' . admin_url('admin-post.php') . '" method="post">
                    <input type="hidden" name="action" value="reset_plugin">
                    <button class="button">Reset Plugin</button>
                </form>
                
                
            </div>
        </div>

        <b class="ss-mt-3 ss-d-block" ><a class="ss-link-unstyled ss-text-purple" href="https://github.com/ShatterSearch/wordpress-plugin">README.md</a></b>
        <script src="https://embed.shattersearch.com/scripts/wordpress-news.js?date=' . strtotime(date("F j, Y")) . '"></script>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right($stats), $template);
print $template;