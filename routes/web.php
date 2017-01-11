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

Route::group( [ 'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localize' ] ], function () {

	Route::get( '/', 'HomeController@getHome' )->name( 'home' );
	Route::get( LaravelLocalization::transRoute( 'routes.about' ), 'HomeController@getAboutUs' )->name( 'about-us' );

	Route::get( LaravelLocalization::transRoute( 'routes.category' ), 'ProductController@getProductOverview' )->name( 'category' );
	Route::get( LaravelLocalization::transRoute( 'routes.detail' ), 'ProductController@getProductDetail' )->name( 'detail' );

} );

Route::group( [ 'prefix' => "admin" ], function () {
	Route::get( '/', "AdminController@getDashboard" )->name( 'admin-dashboard' );

	Route::get( '/login', "AdminController@getLogin" )->name( 'admin-login' );
	Route::post( '/login', "Auth\\LoginController@login" );

	Route::get( '/logout', "Auth\\LoginController@logout" )->name( 'admin-logout' );

	Route::get( '/register', "AdminController@getRegister" )->name( 'admin-register' );
	Route::post( '/register', "Auth\\RegisterController@register" );

	Route::get( '/tags/create', "TagController@getTagsCreate" )->name( 'admin-tag-create' );
	Route::post( '/tags/create', "TagController@postTagsCreate" );

	Route::get( '/tags/create', "TagController@getTagsCreate" )->name( 'admin-tag-create' );
	Route::post( '/tags/create', "TagController@postTagsCreate" );
} );