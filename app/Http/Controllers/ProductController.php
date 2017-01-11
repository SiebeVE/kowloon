<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends BaseController {
	public function getProductOverview( $category ) {
		return view( 'products.overview' );
	}

	public function getProductDetail( $category, $product ) {
		return view( 'products.detail' );

	}
}
