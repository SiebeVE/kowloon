<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

	Route::get( '/', 'HomeController@getHome' )->name( 'home' );
	Route::get( '/about-us', 'HomeController@getAboutUs' )->name( 'about-us' );

	Route::get( '/products/{category}', 'ProductController@getProduct' );

});