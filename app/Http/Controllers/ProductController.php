<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends BaseController {
	public function __construct() {
		$this->middleware( 'login', [ "except" => [ "getProductOverview", "getProductDetail" ] ] );
		parent::__construct();
	}

	public function getProductOverview( $category ) {
		return view( 'products.overview' );
	}

	public function getProductDetail( $category, $product ) {
		return view( 'products.detail' );
	}

	public function getProductsCreate() {
		return view( 'admin.products.create' );
	}

	public function postProductsCreate( Request $request ) {

	}

	public function getProductsView() {
		return view( 'admin.products.view' );
	}

	public function getProductsEdit( Product $product ) {

	}

	public function postProductsEdit( Request $request, Product $product ) {

	}

	public function getProductsDelete( Product $product ) {

	}

	public function postProductsDelete( Request $request, Product $product ) {

	}
}
