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

Route::group( [ 'prefix'     => LaravelLocalization::setLocale(),
                'middleware' => [ 'localize', 'localeSessionRedirect', 'localizationRedirect' ]
], function () {

	Route::get( '/', 'HomeController@getHome' )->name( 'home' );
	Route::post( '/', 'HomeController@postHome' )->name('home-post');

	Route::get( LaravelLocalization::transRoute( 'routes.about' ), 'HomeController@getAboutUs' )->name( 'about-us' );
	Route::post( LaravelLocalization::transRoute( 'routes.about' ), 'HomeController@postAboutUs' )->name('about-us-post');

	Route::get( LaravelLocalization::transRoute( 'routes.category' ), 'ProductController@getProductOverview' )->name( 'category' );
	Route::get( LaravelLocalization::transRoute( 'routes.detail' ), 'ProductController@getProductDetail' )->name( 'detail' );

} );

Route::group( [ 'prefix' => "admin" ], function () {
	Route::get( '/', "AdminController@getDashboard" )->name( 'admin-dashboard' );
	Route::post( '/', "AdminController@postDashboard" )->name( 'admin-dashboard-post' );

	Route::get( '/login', "AdminController@getLogin" )->name( 'admin-login' );
	Route::post( '/login', "Auth\\LoginController@login" )->name( 'admin-login-post' );

	Route::get( '/logout', "Auth\\LoginController@logout" )->name( 'admin-logout' );

	Route::get( '/register', "AdminController@getRegister" )->name( 'admin-register' );
	Route::post( '/register', "Auth\\RegisterController@register" )->name( 'admin-register-post' );


	Route::get( '/tags/create', "TagController@getTagsCreate" )->name( 'admin-tag-create' );
	Route::post( '/tags/create', "TagController@postTagsCreate" )->name( 'admin-tag-create-post' );

	Route::get( '/tags/view', "TagController@getTagsView" )->name( 'admin-tag-view' );

	Route::get( '/tags/edit/{tag}', "TagController@getTagsEdit" )->name( 'admin-tag-edit' );
	Route::post( '/tags/edit/{tag}', "TagController@postTagsEdit" )->name( 'admin-tag-edit-post' );

	Route::get( '/tags/delete/{tag}', "TagController@getTagsDelete" )->name( 'admin-tag-delete' );
	Route::post( '/tags/delete/{tag}', "TagController@postTagsDelete" )->name( 'admin-tag-delete-post' );


	Route::get( '/faqs/create', "FaqController@getFaqsCreate" )->name( 'admin-faq-create' );
	Route::post( '/faqs/create', "FaqController@postFaqsCreate" )->name( 'admin-faq-create-post' );

	Route::get( '/faqs/view', "FaqController@getFaqsView" )->name( 'admin-faq-view' );

	Route::get( '/faqs/edit/{faq}', "FaqController@getFaqsEdit" )->name( 'admin-faq-edit' );
	Route::post( '/faqs/edit/{faq}', "FaqController@postFaqsEdit" )->name( 'admin-faq-edit-post' );

	Route::get( '/faqs/delete/{faq}', "FaqController@getFaqsDelete" )->name( 'admin-faq-delete' );
	Route::post( '/faqs/delete/{faq}', "FaqController@postFaqsDelete" )->name( 'admin-faq-delete-post' );


	Route::get( '/products/create', "ProductController@getProductsCreate" )->name( 'admin-product-create' );
	Route::post( '/products/create', "ProductController@postProductsCreate" )->name( 'admin-product-create-post' );

	Route::get( '/products/view', "ProductController@getProductsView" )->name( 'admin-product-view' );

	Route::get( '/products/edit/{product}', "ProductController@getProductsEdit" )->name( 'admin-product-edit' );
	Route::post( '/products/edit/{product}', "ProductController@postProductsEdit" )->name( 'admin-product-edit-post' );

	Route::get( '/products/delete/{product}', "ProductController@getProductsDelete" )->name( 'admin-product-delete' );
	Route::post( '/products/delete/{product}', "ProductController@postProductsDelete" )->name( 'admin-product-delete-post' );
} );