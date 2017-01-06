/**
 * Created by Siebe on 6/01/2017.
 */
(function ( window, document, $, undefined ) {
	$(".faq .faq-title").on("click", function () {
		$(this).parent().toggleClass("opened");
	})
}(window, window.document, jQuery));