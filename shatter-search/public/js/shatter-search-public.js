(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$( window ).load(function() {
		if($('#ssAPIKey')){
			var apiKey = $('#ssAPIKey').data("key");
			var pluginVersion = $('#ssAPIKey').data("version");
			var selfHosted = $('#ssAPIKey').data("self-hosted");
			var serviceBaseUrl = 'https://shattersearch.com/api/v1';
            var scriptURL = 'https://embed.shattersearch.com/scripts/widget.js';
			(function (w, d, s, o, f, js, fjs) {
				w[o] = w[o] || function () { (w[o].q = w[o].q || []).push(arguments) };
				js = d.createElement(s), fjs = d.getElementsByTagName(s)[0];
				js.id = o; js.src = f; js.async = 1; fjs.parentNode.insertBefore(js, fjs);
			}(window, document, 'script', '_ss', scriptURL));

			_ss('init', {
				minimized: true,
				baseStyles: true,
				pluginVersion: pluginVersion,
				apiKey: 'SS-' + apiKey,
				serviceBaseUrl: serviceBaseUrl
			});
		}
	});
})( jQuery );
