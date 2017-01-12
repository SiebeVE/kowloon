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
		$tags = Tag::count();
		$faqs = Faq::count();
		$products = Product::count();
		return view( 'admin.dashboard',[
			"tag" => $tags,
			"faq" => $faqs,
			"product" => $products,
		] );
	}
}
