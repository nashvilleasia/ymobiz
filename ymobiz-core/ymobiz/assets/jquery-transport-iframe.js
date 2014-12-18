/**
 * The [source for the plugin](http://github.com/cmlenz/jquery-iframe-transport)
 * is available on [Github](http://github.com/) and dual licensed under the MIT
 * or GPL Version 2 licenses.
 */

(function($, undefined) {
	"use strict";

	// Register a prefilter that checks whether the `iframe` option is set, and
	// switches to the "iframe" data type if it is `true`.
	$.ajaxPrefilter(function(options, origOptions, jqXHR) {
		if (options.iframe) {
			return "iframe";
		}
	});

	// Register a transport for the "iframe" data type. It will only activate
	// when the "files" option has been set to a non-empty list of enabled file
	// inputs.
	$.ajaxTransport("iframe", function(options, origOptions, jqXHR) {
		var form = null,
			iframe = null,
			name = "iframe-" + $.now(),
			files = $(options.files).filter(":file:enabled"),
			plus = /\+/g,
			markers = null;

		// This function gets called after a successful submission or an abortion
		// and should revert all changes made to the page to enable the
		// submission via this transport.
		function cleanUp() {
			markers.replaceWith(function(idx) {
				return files.get(idx);
			});
			form.remove();
			iframe.attr("src", "javascript:false;").remove();
		}

		// Remove "iframe" from the data types list so that further processing is
		// based on the content type returned by the server, without attempting an
		// (unsupported) conversion from "iframe" to the actual type.
		options.dataTypes.shift();

		if (files.length) {
			form = $("<form enctype='multipart/form-data' method='post'></form>").
				hide().attr({action: options.url, target: name});

			// If there is any additional data specified via the `data` option,
			// we add it as hidden fields to the form. This (currently) requires
			// the `processData` option to be set to false so that the data doesn't
			// get serialized to a string.
			//			if (typeof(options.data) === "string" && options.data.length > 0) {
			//				$.error("data must not be serialized");
			//			}

			//Error above no longer necessary. We let ajax do processData to get the query string
			//and then parse the nice flat query string to create the hidden inputs
			//Has the advantage of handling php style array names name="something[blue]" name="something[red]"
			$.each( options.data.split('&') || {}, function(name, value) {
				var tuple = value.split('=');
				$("<input type='hidden' />").attr({name:  decodeURIComponent(tuple[0].replace(plus,' ')), value: decodeURIComponent(tuple[1].replace(plus, ' ')) }).
					appendTo(form);
			});

			// Add a hidden `X-Requested-With` field with the value `IFrame` to the
			// field, to help server-side code to determine that the upload happened
			// through this transport.
			$("<input type='hidden' value='IFrame' name='X-Requested-With' />").
				appendTo(form);

			// Move the file fields into the hidden form, but first remember their
			// original locations in the document by replacing them with disabled
			// clones. This should also avoid introducing unwanted changes to the
			// page layout during submission.
			markers = files.after(function(idx) {
				return $(this).clone().prop("disabled", true);
			}).next();
			files.appendTo(form);

			return {

				// The `send` function is called by jQuery when the request should be
				// sent.
				send: function(headers, completeCallback) {
					iframe = $("<iframe src='javascript:false;' name='" + name +
						"' id='" + name + "' style='display:none'></iframe>");

					// The first load event gets fired after the iframe has been injected
					// into the DOM, and is used to prepare the actual submission.
					iframe.bind("load", function() {

						// The second load event gets fired when the response to the form
						// submission is received. The implementation detects whether the
						// actual payload is embedded in a `<textarea>` element, and
						// prepares the required conversions to be made in that case.
						iframe.unbind("load").bind("load", function() {
							var doc = this.contentWindow ? this.contentWindow.document :
									(this.contentDocument ? this.contentDocument : this.document),
								root = doc.documentElement ? doc.documentElement : doc.body,
								textarea = root.getElementsByTagName("textarea")[0],
								type = textarea && textarea.getAttribute("data-type") || null,
								status = textarea && textarea.getAttribute("data-status") || 200,
								statusText = textarea && textarea.getAttribute("data-statusText") || "OK",
								content = {
									html: root.innerHTML,
									text: type ?
										textarea.value :
										root ? (root.textContent || root.innerText) : null
								};
							cleanUp();
							completeCallback(status, statusText, content, type ?
								("Content-Type: " + type) :
								null);
						});

						// Now that the load handler has been set up, submit the form.
						form[0].submit();
					});

					// After everything has been set up correctly, the form and iframe
					// get injected into the DOM so that the submission can be
					// initiated.
					$("body").append(form, iframe);
				},

				// The `abort` function is called by jQuery when the request should be
				// aborted.
				abort: function() {
					if (iframe !== null) {
						iframe.unbind("load").attr("src", "javascript:false;");
						cleanUp();
					}
				}
			};
		}
	});

})(jQuery);