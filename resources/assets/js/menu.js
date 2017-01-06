/**
 * Created by Siebe on 6/01/2017.
 */
(function ( window, document, $, undefined ) {
	// Admin linking with cheets
	cheet('↑ ↑ ↓ ↓ ← → ← → b a', function () {
		window.location = "/admin";
	});
	cheet('f2 f4', function () {
		window.location = "/admin";
	});
	
	$("#kowloon-menu-footer").lettering();
	
	$("#menu-toggle").on("click", function () {
		$(this).parent().toggleClass("opened");
	})
}(window, window.document, jQuery));