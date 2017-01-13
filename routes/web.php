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
	Route::post( '/', "AdminController@postDashboard" );

	Route::get( '/login', "AdminController@getLogin" )->name( 'admin-login' );
	Route::post( '/login', "Auth\\LoginController@login" );

	Route::get( '/logout', "Auth\\LoginController@logout" )->name( 'admin-logout' );

	Route::get( '/register', "AdminController@getRegister" )->name( 'admin-register' );
	Route::post( '/register', "Auth\\RegisterController@register" );


	Route::get( '/tags/create', "TagController@getTagsCreate" )->name( 'admin-tag-create' );
	Route::post( '/tags/create', "TagController@postTagsCreate" );

	Route::get( '/tags/view', "TagController@getTagsView" )->name( 'admin-tag-view' );

	Route::get( '/tags/edit/{tag}', "TagController@getTagsEdit" )->name( 'admin-tag-edit' );
	Route::post( '/tags/edit/{tag}', "TagController@postTagsEdit" );

	Route::get( '/tags/delete/{tag}', "TagController@getTagsDelete" )->name( 'admin-tag-delete' );
	Route::post( '/tags/delete/{tag}', "TagController@postTagsDelete" );


	Route::get( '/faqs/create', "FaqController@getFaqsCreate" )->name( 'admin-faq-create' );
	Route::post( '/faqs/create', "FaqController@postFaqsCreate" );

	Route::get( '/faqs/view', "FaqController@getFaqsView" )->name( 'admin-faq-view' );

	Route::get( '/faqs/edit/{faq}', "FaqController@getFaqsEdit" )->name( 'admin-faq-edit' );
	Route::post( '/faqs/edit/{faq}', "FaqController@postFaqsEdit" );

	Route::get( '/faqs/delete/{faq}', "FaqController@getFaqsDelete" )->name( 'admin-faq-delete' );
	Route::post( '/faqs/delete/{faq}', "FaqController@postFaqsDelete" );


	Route::get( '/products/create', "ProductController@getProductsCreate" )->name( 'admin-product-create' );
	Route::post( '/products/create', "ProductController@postProductsCreate" );

	Route::get( '/products/view', "ProductController@getProductsView" )->name( 'admin-product-view' );

	Route::get( '/products/edit/{product}', "ProductController@getProductsEdit" )->name( 'admin-product-edit' );
	Route::post( '/products/edit/{product}', "ProductController@postProductsEdit" );

	Route::get( '/products/delete/{product}', "ProductController@getProductsDelete" )->name( 'admin-product-delete' );
	Route::post( '/products/delete/{product}', "ProductController@postProductsDelete" );
} );