/**
 * Created by Siebe on 13/01/2017.
 */
(function ( window, document, $, undefined ) {
	$("div").on("click", "> button.add", function () {
		var $parent = $(this).parent();
		var $button = $(this);
		var $template = $parent.find("#" + $button.data("template-id")).first();
		var $append = $parent.find("#" + $button.data("append-id")).first();
		
		var $copy = $template.clone().find(":first-child").first();
		$copy.find("input").removeAttr("disabled");
		
		$append.append($copy);
	})
		.on("click", "> button.remove", function () {
			var $parent = $(this).parent();
			var $button = $(this);
			var $append = $parent.find("#" + $button.data("append-id")).first();
			var $last = $append.children().last();
			// console.log($last);
			$last.remove();
		});
}(window, window.document, jQuery));