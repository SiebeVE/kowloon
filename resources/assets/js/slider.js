/**
 * Created by Siebe on 10/01/2017.
 */
(function ( window, document, $, undefined ) {
	// Create sliders and stuff
	var $sliders = $(".sliders-range");
	
	$sliders.each(function () {
		var baseId = $(this).data("inputid");
		
		var slider = noUiSlider.create($(this)[ 0 ], {
			start: [ 8, 500 ],
			step: 1,
			connect: true,
			range: {
				'min': [ 8 ],
				'max': [ 500 ]
			}
		});
		
		// Listen to slider
		slider.on("update", function ( values, handle ) {
			var value = values[ handle ];
			
			if (handle) {
				// Maximum
				document.getElementById(baseId + "-max").value = Math.round(value);
			}
			else {
				// Minimum
				document.getElementById(baseId + "-min").value = Math.round(value);
			}
		});
		
		// Slider listen back to input
		var $inputs = $("[id^=" + baseId + "-]");
		console.log($inputs);
		
		$inputs.each(function () {
			var $currentInput = $(this);
			var id = $currentInput.attr("id");
			$currentInput.on("change", function () {
				switch (id.split("-")[ 1 ]) {
					case "min":
						slider.set([
							$(this)[ 0 ].value, null
						]);
						break;
					case "max":
						slider.set([
							null, $(this)[ 0 ].value
						]);
						break;
				}
			})
		});
		// inputs.addEventListener("change", function(){
		// 	slider.set([this.value, null]);
		// })
	});
}(window, window.document, jQuery));