<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller {
	protected $loginPath = '/admin/login';

	public function __construct() {
		$this->middleware( 'login', [ 'except' => [ 'getLogin', 'getRegister' ] ] );
	}

	public function getLogin() {
		return view( 'admin.auth.login' );
	}

	public function getRegister() {
		return view( 'admin.auth.register' );
	}

	public function getDashboard() {
		$tags       = Tag::count();
		$faqs       = Faq::count();
		$products   = Product::with( 'category' )->get();
		$count      = $products->count();
		$productsGr = $products->groupBy( 'category_id' );

		return view( 'admin.dashboard', [
			"tag"          => $tags,
			"faq"          => $faqs,
			"productCount" => $count,
			"hasHot"       => Product::where( 'hot_item', "!=", 0 )->count(),
			"productsCat"  => $productsGr,
		] );
	}

	public function postDashboard( Request $request ) {
		$toValidate = [
			"hot_item"   => "required|array",
			"hot_item.*" => "required|integer|exists:products,id|distinct"
		];

		$this->validate( $request, $toValidate );
		Product::where( 'hot_item', "!=", 0 )->update( [ "hot_item" => 0 ] );

		foreach ( $request->hot_item as $hot_key => $productId ) {
			$product           = Product::find( $productId );
			$product->hot_item = $hot_key;
			$product->save();
		}

		flashToastr( "success", "Hot items updated", "The hot items are successfully updated!" );

		return redirect()->route( 'admin-dashboard' );
	}
}
