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
        <div class="ss-card faded ">
            <h3>Shatter Search Support</h3>
            <div class="ss-px-4 ss-mt-3">
                <p class=" ss-mt-3">
                    Some support issues may require your <b>support code.</b>  You can find it in your Business Control Panel under "Support"
                </p>
                <ul class="ss-mt-3 ss-w-100 ss-w-lg-75 ">
                    <li class="ss-mb-0">
                        <a target="_blank" class="ss-link-unstyled" href="mailto:help@shattersearch.com">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Email Support</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    help@shattersearch.com 
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="ss-mt-3 ss-mb-0">
                        <a target="_blank" class="ss-link-unstyled" href="https://shattersearch.com/support/tickets">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Support Tickets</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    We\'ll get back to you as soon as we can.
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="ss-mt-3 ss-mb-0">
                        <a target="_blank" class="ss-link-unstyled" href="https://shattersearch.com/support/chat">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Chat With Us</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Click here to connect
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="ss-mt-3 ss-mb-0">
                        <a target="_blank" class="ss-link-unstyled" href="https://shattersearch.com/support/knowledgebase">
                            <div class="ss-px-3">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div>
                                <b>Knowledgebase</b>
                                <p class="ss-mb-0 ss-lh-1 ss-mt-2 ss-text-dark">
                                    Read our Frequently Asked Questions
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right(), $template);
print $template;