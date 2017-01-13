<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot() {
		Route::bind( 'tag', function ( $value ) {
			return \App\Tag::whereTranslation( 'slug', $value )->first();
		} );

		Route::bind( 'faq', function ( $value ) {
			return \App\Faq::whereTranslation( 'slug', $value )->first();
		} );

		Route::bind( 'product', function ( $value ) {
			return \App\Product::whereTranslation( 'slug', $value )->with( 'faqs' )->with( 'tags' )->first();
		} );

		parent::boot();
	}

	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map() {
		$this->mapApiRoutes();

		$this->mapWebRoutes();

		//
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes() {
		Route::group( [
			'middleware' => 'web',
			'namespace'  => $this->namespace,
		], function ( $router ) {
			require base_path( 'routes/web.php' );
		} );
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes() {
		Route::group( [
			'middleware' => 'api',
			'namespace'  => $this->namespace,
			'prefix'     => 'api',
		], function ( $router ) {
			require base_path( 'routes/api.php' );
		} );
	}
}
