var gulp = require('gulp');
var config = require('./config.js');
var libraries = {
	concat: require('gulp-concat'),
	iconfont: require('gulp-iconfont'),
	imagemin: require('gulp-imagemin'),
	runSequence: require('run-sequence'),
	consolidate: require('gulp-consolidate'),
	uglify: require('gulp-uglify'),
	plumber: require('gulp-plumber'),
	notify: require('gulp-notify')
};

const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function ( mix ) {
	mix.sass('app.scss')
		.webpack('app.js');
	
	mix.browserSync({
		proxy: 'kowloon.local'
	});
});

// gulp.task('default', [ 'watch' ]);
// gulp.task('watch', function () {
//
// 	gulp.watch(config.paths.css.files, [ 'compass' ]);
// 	gulp.watch(config.paths.js.files, [ 'scripts' ]);
//
// });
//
// gulp.task('compass', function () {
//
// 	gulp.src(config.paths.css.files)
// 		.pipe(libraries.plumber({errorHandler: libraries.notify.onError("Error: <%= error.message %>")}))
// 		.pipe(libraries.compass({
// 			comments: false,
// 			sourcemap: false,
// 			require: [ 'sass-globbing' ],
// 			style: 'compressed',
// 			sass: config.paths.css.source,
// 			css: config.paths.css.target
// 		}))
// 		.pipe(gulp.dest(config.paths.css.target));
//
// });

gulp.task('go-live', function () {
	libraries.runSequence('images');
});

gulp.task('scripts', function () {
	
	gulp.src([ config.paths.js.essentials.files, config.paths.js.main.files ])
		.pipe(libraries.plumber({errorHandler: libraries.notify.onError("Error: <%= error.message %>")}))
		.pipe(libraries.uglify())
		.pipe(libraries.concat('main.js'))
		.pipe(gulp.dest(config.paths.js.target));
});

gulp.task('images', function () {
	
	gulp.src(config.paths.img.files)
		.pipe(libraries.imagemin({
			progressive: true
		}))
		.pipe(gulp.dest(config.paths.img.target));
	
});

gulp.task('iconfont', function () {
	
	return gulp.src([ config.paths.fonts.files ])
		.pipe(libraries.iconfont({
			centerHorizontally: false,
			appendUnicode: false,
			fontName: 'icons',
			fontPath: '../fonts/',
			formats: [ 'ttf', 'eot', 'woff', 'woff2', 'svg' ],
			className: 'icon',
			normalize: true,
			timestamp: Math.round(Date.now() / 1000),
			log: (function () {
			})
		}))
		.on('glyphs', function ( glyphs, options ) {
			
			gulp.src('assets/templates/_icons.scss')
				.pipe(libraries.consolidate('lodash', {
					glyphs: glyphs,
					fontName: 'icons',
					fontPath: '../fonts/',
					className: 'icon'
				}))
				.pipe(gulp.dest('assets/sass/helpers'));
			
		})
		.pipe(gulp.dest(config.paths.fonts.target));
	
});