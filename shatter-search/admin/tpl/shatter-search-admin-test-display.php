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
 * @subpackage Shatter_Search/admin/partials
 */
?>
<div class="wrap ss-wrap">
    <div class="ss-header">
        <img src="https://assets.shattersearch.com/a/logo/logo.svg" /> 
        <div>
            <h1>Shatter Search</h1>
            <span>WordPress Plugin For Cannabis Brands</span>
        </div>
    </div>
    <div class="ss-cols">
        <div class="ss-left">
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
        </div>
        <div class="ss-right">
            <div class="ss-card faded">
                <h3>Initial Setup Required!</h3>
                <div class="ss-well ss-mt-2 ss-p-2">
                    <div class="ss-well-icon">
                        <i class="fas fa-2x fa-info-circle fa-fw"></i>
                    </div>
                    <p class="ss-mb-0">
                        You'll need to add your brand's <b>Shatter Search API Key</b> to get started.
                    </p>
                </div>
                <div class="ss-px-3 ss-pt-3">
                    <form>
                        <div class="ss-cols">
                            <div class="ss-left ss-bg-light">
                                <div>
                                    <b>Public API Key:</b>
                                    <small>Available in your brand or store dashboard under "Website"</small>
                                </div>  
                            </div>
                            <div class="ss-right">
                                <input type="text" name="apiKey" placeholder="eg: SS-0123456789" />
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
                                <input type="text" name="apiKey" placeholder="eg: 748216db-fc2f-40e2-ba85-af9aa0c105c2" />
                            </div>
                        </div>

                        <div class="ss-cols">
                            <div class="ss-left ss-bg-light">
                                &nbsp;
                            </div>
                            <div class="ss-right">
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
        </div>
    </div>
</div>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
