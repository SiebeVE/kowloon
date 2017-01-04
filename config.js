/**
 * Created by Siebe on 3/01/2017.
 */
module.exports = {
	paths: {
		css: {
			files: 'resources/assets/sass/**/**/*.{sass,scss}',
			source: 'resources/assets/sass',
			target: 'public/css'
		},
		img:{
			files: 'resources/assets/images/**/**/*',
			target: 'public/images'
		},
		js: {
			files: 'resources/assets/js/**/**/*.js',
			target: 'public/js',
			essentials: {
				files: 'resources/assets/js/libs/**/*.js'
			},
			main: {
				files: 'resources/assets/js/**/**/*.js'
			}
		},
		fonts: {
			files: 'resources/assets/svg/*.svg',
			target: 'public/fonts'
		}
	}
};