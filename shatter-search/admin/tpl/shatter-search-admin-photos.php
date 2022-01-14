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
function right(){
    return '
        <div class="ss-card faded ">
            <h3>Product Photos</h3>
            <div class="ss-px-4">
                ' . (!empty($tryAgain) ? 
                    '<p class="ss-danger">Please try again</p>'
                    : ''
                ) . '
                <form action="" method="post">
                    <input type="hidden" name="action" value="initial_setup">
                    <div class="ss-cols">
                        <div class="ss-left ss-bg-light">
                            <div>
                                <b>Add This Shortcode:</b>
                                <small>Create a page for your store locator and add this shortcode to the body.</small>
                            </div>  
                        </div>
                        <div class="ss-right">
                            <span style="font-weight: 700; background:#efefef; padding:6px; border-radius: 0.25rem;">
                                [ss-photos]
                            </span>
                        </div>
                    </div>
                </form>
                <p class="ss-pt-2">
                    We will add customization options for this shortcode in the future.
                </p>
                <a class="button button-purple" href="https://app.shattersearch.com/biz"><i class="fas fa-tachometer-alt"></i> &nbsp;Manage Your Photos</a>
            </div>
        </div>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right(), $template);
print $template;