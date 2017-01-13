/**
 * Created by Siebe on 12/01/2017.
 */
(function ( window, document, $, undefined ) {
	var inputs = document.querySelectorAll('input[type=file]');
	var examples = document.querySelectorAll('.examples-images');
	Array.prototype.forEach.call(inputs, function ( input ) {
		var label = input.nextElementSibling,
			labelVal = label.innerHTML;
		input.addEventListener('change', function ( e ) {
			
			// var reader = new FileReader();
			$(examples).empty();
			for (var fileId = 0; fileId < this.files.length; fileId++) {
				var objectUrl = window.URL.createObjectURL(this.files[ fileId ]);
				$(examples).append("<img src='" + objectUrl + "' />");
				window.URL.revokeObjectURL(this.files[ fileId ]);
			}
			
			var fileName = '';
			if (this.files && this.files.length > 1) {
				fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
			}
			else {
				fileName = e.target.value.split('\\').pop();
			}
			
			if (fileName) {
				label.querySelector('span').innerHTML = fileName;
			}
			else {
				label.innerHTML = labelVal;
			}
		});
	});
}(window, window.document, jQuery));