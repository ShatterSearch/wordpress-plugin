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
function right($imgPath){
    return '
        <div class="ss-card faded ">
            <h3>The Bubble</h3>
            <div class="ss-px-4">
                <p class="ss-mt-2">
                    <b>"The Bubble"</b> puts your retailers and product drops on every page of your website.
                </p>
                <p class="ss-mt-2" style="background: #ffc107; padding:6px; display:inline-block; font-weight:500; border-radius: 0.25rem;">
                    You can view an example of The Bubble on our demo site - <a href="https://fakecannabisbrand.xyz" style="color:black; font-weight:700;">Fake Cannabis Brand</a>.
                </p>
                <p class="ss-mt-2">
                    The Bubble works on both desktop browsers and mobile devices and is displayed on the bottom of the screen.
                    By default, The Bubble is minimized and expands when clicked.
                </p>
                <p class="ss-mt-2">
                    Customization options for The Bubble are coming soon.
                </p>
                <img src="' .  $imgPath . '/bubble.png" class="ss-preview-image">
            </div>
        </div>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right($imgPath), $template);
print $template;