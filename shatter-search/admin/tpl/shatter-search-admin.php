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
            <h3>Welcome!</h3>
            <div class="ss-px-4 ss-mt-2">
                <p class="">You\'ve successfully installed the Shatter Search plugin! We hope you find this useful and easy to use.</p>
            
                <p class="ss-mt-2">
                    Please reach out to us through the <a href="https://shattersearch.com/support">Support Center</a> or email help@shattersearch.com if you require any assistance.
                </p>
                <div class="ss-news ss-mt-3">
                    <b>Latest News</b>:
                    <a class="ss-d-block ss-mt-2" href="#">Plugin News Headline</a>
                    <p class="ss-mb-2 ss-mt-2">
                        Sunt ullamco elit enim ex irure in. Voluptate exercitation excepteur qui enim cillum quis in. Ea veniam aliquip tempor officia qui aute eu commodo adipisicing laboris ipsum minim. In irure consequat proident nostrud nulla occaecat velit dolore ad duis aute Lorem. Aute nostrud incididunt ut sit incididunt ut id excepteur laborum laborum exercitation irure eu.
                    </p>
                    <a href="#">Read More &nbsp;<i class="fas fa-arrow-right"></i></a>
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
                        <a class="ss-link-unstyled" href="#">
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
                        <a class="ss-link-unstyled" href="#">
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
                        <a class="ss-link-unstyled" href="#">
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
                        <a class="ss-link-unstyled" href="#">
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
                    <div>Janaury 12, 2022 at 12:33 PM</div>
                </div>
                <div class="ss-table">
                    <div>API Status:</div>
                    <div>Valid</div>
                </div>
                <div class="ss-table">
                    <div>Account Type:</div>
                    <div>Brand</div>
                </div>
                <div class="ss-table">
                    <div>Brand:</div>
                    <div>Fake Lab (#131)</div>
                </div>
                <div class="ss-table">
                    <div>Retailers:</div>
                    <div>325</div>
                </div>
                <div class="ss-table">
                    <div>Drops:</div>
                    <div>3</div>
                </div>
            </div>
        </div>

        <b class="ss-mt-3 ss-d-block" ><a class="ss-link-unstyled ss-text-purple" href="https://github.com/ShatterSearch/wordpress-plugin">README.md</a></b>
    ';
}

$templateFile = file_get_contents(plugin_dir_path( dirname( __FILE__ ) ) . 'partials/layout.tpl.php');
$template = str_replace('{left}', left(), $templateFile);
$template = str_replace('{right}', right(), $template);
print $template;