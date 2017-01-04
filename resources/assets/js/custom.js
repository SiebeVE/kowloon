(function(window, document, $, undefined) {

	var project = {

		init: function() {

			project.viewport.init();

		},
		viewport: {
			init: function(){

				project.viewport.element = $(window);

				// get dimensions
				project.viewport.resize();

				// bind events
				project.viewport.element.bind('resize', project.viewport.resize);

			},
			resize: function(){

				// clear timer
				clearTimeout(project.viewport.resizeTimer);

				// get dimensions
				project.viewport.w = project.viewport.element.width();
				project.viewport.h = project.viewport.element.height();

				// define layout
				project.viewport.layout = 4;
				if(Modernizr.mq('only screen and (max-width: 419px)')) { project.viewport.layout = 1; }
				if(Modernizr.mq('only screen and (min-width: 420px) and (max-width: 767px)')) { project.viewport.layout = 2; }
				if(Modernizr.mq('only screen and (min-width: 768px) and (max-width: 1023px)')) { project.viewport.layout = 3; }
				if(Modernizr.mq('only screen and (min-width: 1024px)')) { project.viewport.layout = 4; }

				// set timer
				project.viewport.resizeTimer = setTimeout(function() { }, 60);

			}
		}

	};

	// Initialize project
	if(typeof(window.jQuery) === 'undefined' || typeof($) === 'undefined') { console.error('=== No jQuery defined ==='); return; }
	$(document).ready(project.init);

}(window, window.document, window.jQuery));