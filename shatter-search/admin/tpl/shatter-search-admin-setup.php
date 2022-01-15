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
        <div class="ss-card faded">
            <h3>Initial Setup Required!</h3>
            <div class="ss-well ss-mt-2 ss-p-2">
                <div class="ss-well-icon">
                    <i class="fas fa-2x fa-info-circle fa-fw"></i>
                </div>
                <p class="ss-mb-0">
                    You\'ll need to add your brand\'s <b>Shatter Search API Key</b> to get started.
                </p>
            </div>
            <div class="ss-px-4 ss-pt-2">
                ' . (!empty($tryAgain) ? 
                    '<p class="ss-danger">Please try again</p>'
                    : ''
                ) . '
                <form action="' . admin_url('admin-post.php') . '" method="post">
                    <input type="hidden" name="action" value="initial_setup">
                    <div class="ss-cols">
                        <div class="ss-left ss-bg-light">
                            <div>
                                <b>Public API Key:</b>
                                <small>Available in your brand or store dashboard under "Website"</small>
                            </div>  
                        </div>
                        <div class="ss-right">
                            <input autocomplete="on" required type="text" name="apiKey" placeholder="eg: SS-0123456789" />
                        </div>
                    </div>
                    <div class="ss-cols">
                        <div class="ss-left ss-bg-light">
                            <div>
                                <b>Private API Key:</b>
                                <small>Available in your brand or store dashboard under "Website"</small>
                            </div>  
                        </div>
                        <div class="ss-right">
                            <input autocomplete="on" required type="text" name="secretApiKey" placeholder="eg: 1a3b5c7d-1a2b-3c4d-5d6f-7g8h9i0j1k2l" />
                        </div>
                    </div>

                    <div class="ss-cols">
                        <div class="ss-right ">

                            <button
                                type="submit"
                                class="button button-purple"
                            >
                                Continue
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right(), $template);
print $template;