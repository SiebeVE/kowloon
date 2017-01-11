/**
 * Created by Siebe on 11/01/2017.
 */
(function ( window, document, $, undefined ) {
	
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		infinite: false,
		asNavFor: '.slider-nav'
	});
	
	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		asNavFor: '.slider-for',
		dots: false,
		arrows: false,
		centerPadding: "0px",
		infinite: false,
		centerMode: true,
		focusOnSelect: true
	});
}(window, window.document, jQuery));