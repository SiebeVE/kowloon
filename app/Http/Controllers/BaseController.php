<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BaseController extends Controller {
	public function __construct() {
		$categories = Category::get();
		// Sharing is caring
		View::share( 'categories', $categories );

		$localUrl         = [];
		$supportedLocales = getSupportedLocales();
		$currentRoute     = Route::current();
		$routeName        = Route::currentRouteName();
		$parameters       = $currentRoute->parameters();
		foreach ( $supportedLocales as $local => $properties ) {
			// Find correct translation for parameters
			foreach ( $parameters as $className => $parameter ) {
				switch ( $className ) {
					case "category":
						$instance = new Category();
						break;
					case "product":
						$instance = new Product();
						break;
				}
				$instance = $instance->whereTranslation( 'slug', $parameter )->first();

				$parameters[ $className ] = $instance{"slug:" . $local};
			}
			$url = localizedUrl( $routeName, $parameters, $local );
			if ( strpos( $url, '/en/' ) !== false ) {
				$url = str_replace( "producten", "products", $url );
			} else if ( strpos( $url, '/nl/' ) !== false ) {
				$url = str_replace( "products", "producten", $url );
			}
			$localUrl[ $local ] = $url;
		}
		View::share( 'localUrl', $localUrl );
	}
}
