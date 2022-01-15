# Shatter Search

We offer web services for cannabis brands!

👋 hello@shattersearch.com

Our mission is to become a leading provider of web services & software created specifically for cannabis extract brands.

### This plugin is intended for:
Brands that manufacture cannabis extracts (vape pens, wax, shatter, solventless extracts, CBD products, etc)

Dispensaries and delivery services that carry cannabis extract products

### Why use this plugin?
This plugin adds or enhances functionality on your website that helps connect your customers with the retailers that carry your products.

You can build a relatively "dumb" website.  Let us handle the heavy lifting.

We help curate photos of your products shared on social media by your customers and retailers.

We syndicate information about your brand through our website, mobile apps, and social media channels.

### Free Onboarding
Getting started should be pretty easy, but we're here to help if you want a hand.

Contact Shatter Search support through our [Support Center](https://shattersearch.com/support) or email help@shattersearch.com

### In Development
This plugin is still in development.  Development roadmap:

* ~Initial plugin setup~
* ~Database setup~
* ~Design admin dashboard layout~
* ~Plugin News~
* ~Admin dashboard - Initial Setup~
* ~Admin dashboard - Index~
* ~Admin dashboard - Support~
* ~Admin dashboard - Store Locator~
* ~Admin dashboard - Product Photos~
* ~Admin dashboard - Product Drops~
* ~Admin dashbaord - Bubble~
* ~Bubble implementation~
* ~Temporary shortcode implementation~
* ~Data Sync~
* ~Final Shortcodes~
* ~Product drops~
* ~Store locator~
* ~Product photos~
* ~Manual data button~
* ~Fix shortcode rendering~
* Shortcode attributes
* Troubleshooting (plugin reset)
* General configuration options
* Frequently Asked Questions
* Wordpress Plugin submission

# All Implementation Options
## Javascript Widget
The JavaScript widget installs in minutes on just about any website.

Generate a `<script>` tag through the [Business Control Panel](https://shattersearch.com/biz) and add it to your website.

The widget is optimized for fast loading and is cached and served by a CDN.

Data for the widget is served by the Shatter Search API upon page load and content is ***injected*** into your website.

**JavaScript Widget Demo:** [Fake Cannabis Brand](https://fakecannabisbrand.xyz)

The [widget documentation](https://fakecannabisbrand.xyz) provides more information on customization.

## WordPress Plugin
Rather than connecting to Shatter Search servers to fetch this data, the plugin stores a local copy of the data pertaining to your store locator and product drops.

The content is served by your WordPress website and included directly in the page's HTML - which may have a positive impact on Search Engine Optimization.

## Shatter Search Website Builder
Let us take the wheel.

We have a full-featured website builder for cannabis extract brands on the way.

Contact us for early access to the beta at a discounted rate - help@shattersearch.com

## Shatter Search API
API access is available upon request and allows you to build out custom implementations.

# Features

### Enhanced Store Locator
* Manage your list of retailers through our [Brand Control Panel on ShatterSearch](https://shattersearch.com/register)
* We keep your retailer information up-to-date  (logo, phone number, website, social media, etc)
* Display photos of recent extracts available at your retailers
* Shatter Search staff will add photos from social media channels when possible
* Our widget (optionally) puts this information in a "bubble" on every page of your website.
* Your store locator is syndicated on [our website](https://shattersearch.com) and mobile apps.

### Drops Publication
* Build hype around your "product drops"
* Let your customers know **what products** are available **where**
* Optionally attach photos to each product drop
* Allow your customers to subscribe to notifications of new product drops
* Our widget (optionally) puts this information in a "bubble" on every page of your website.
* Your product drops are syndicated on [our website](https://shattersearch.com) and mobile apps.

### Product Photos
* Display photos and videos of recent extracts that you've produced
* Optionally tag the retailer they were distributed to
* Optionally, we can help curate photos from social media (when possible)


### The Bubble
* Gives your customers easy access to a list of retailers and product drops in a "bubble".
* Displayed on every page of your website (or not, if you prefer)
* Starts minimized and expands when clicked (by default)
* Highly customizable

### Shortcodes
This plugin adds several shortcodes to your WordPress that allow you to add the above-mentioned features to your website.

* `[ss-retailers]` - displays your store locator.
* `[ss-states]` - optionally displays a list of states where your products are sold
* `[ss-retailer-count]` - inserts the number of retailers that carry your product into the page
* `[ss-drops]` - inserts a full list of recent product drops into the page
* `[ss-photos]` - displays recent product photos.

Further information about each shortcode and customization options are located in the plugin settings.

# Subscription Features
In some instances, the use of this WordPress plugin requires a subscription to a plan with Shatter Search.

See the following pages for more information:

[Shatter Search for Brands](https://biz.shattersearch.com/software-for-cannabis-extract-brands)

[Shatter Search for Dispensaries](https://biz.shattersearch.com/software-for-dispensaries)

# Contents

The WordPress Plugin Boilerplate includes the following files:

* `.gitignore`. Used to exclude certain files from the repository.
* `README.md`. The file that you’re currently reading.
* A `shatter-search` directory that contains the source code.

# Installation
Copy the `shatter-search` folder into your `wp-contents/plugins` folder or install it through the Plugins section of your WordPress Admin Dashboard.

Once it's installed, activate the plugin through the admin dashboard.

# Important Notes

The Shatter Search WordPress Plugin was built on top of the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate)! It saved us a great deal of time during development and ensures that the plugin is easy to maintain going forward.

If you have some PHP knowledge and have an interest in developing WordPress plugins, we recommend [starting here](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

We greatly appreciate the contributions of the people listed below and the Open Source Community at large.

We publish a list of Open Source Software that we use in our [Terms of Service](https://shattersearch.com/legal/terms-of-service)

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

A copy of the license is included in the root of the plugin’s directory. The file is named `LICENSE`.

### Licensing

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

For reference, [here's a discussion](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/) that covers the Apache 2.0 License used by [Bootstrap](http://twitter.github.io/bootstrap/).

### Credits


The WordPress Plugin Boilerplate was started in 2011 by [Tom McFarlin](http://twitter.com/tommcfarlin/) and has since included a number of great contributions. In March of 2015 the project was handed over by Tom to Devin Vinson.

The current version of the Boilerplate was developed in conjunction with [Josh Eaton](https://twitter.com/jjeaton), [Ulrich Pogson](https://twitter.com/grapplerulrich), and [Brad Vincent](https://twitter.com/themergency).

# Terms of Service / Privacy Policy
* [Terms of Service](https://shattersearch.com/legal/terms-of-service)
* [Privacy Policy](https://shattersearch.com/legal/privacy-policy)
* [Refund Policy](https://shattersearch.com/legal/refund-policy)
* [Community Guidelines](https://shattersearch.com/legal/community-guidelines)