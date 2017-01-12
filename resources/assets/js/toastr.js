/**
 * Created by Siebe on 11/01/2017.
 */
(function ( window, document, $, undefined ) {
	$(document).ready(function () {
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "2000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
		
		// Find the dom
		var $messageToastr = $("#messageToastr");
		// Check if their is a message
		if ($messageToastr.length > 0) {
			// Search for the settings
			var style = $messageToastr.data("style");
			var title = $messageToastr.find("span.title");
			var content = $messageToastr.find("span.content");
			
			// Show that toastr
			toastr[ style ](content, title);
		}
	});
}(window, window.document, jQuery));