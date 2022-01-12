<?php

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
                    href="https://shattersearch.com"
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
                    href="https://shattersearch.com"
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
function right(){
    return '
        <div class="ss-card faded ss-px-4">
            photos
        </div>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right(), $template);
print $template;