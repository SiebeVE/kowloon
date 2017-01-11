<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryTranslation;
use Illuminate\Http\Request;

class HomeController extends BaseController {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		//$this->middleware('auth');
	}

	/**
	 * Show the homepage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getHome() {
		//$category = new Category();
		//$category->css = "test";
		//$category->save();
		//
		//$category->translateOrNew("nl")->name = "Dit is een test titél";
		//$category->translateOrNew("en")->name = "This is a testing titél";
		//
		//$category->save();
		return view( 'home' );
	}

	/**
	 * Show the about us page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getAboutUs() {
		return view( 'about-us' );
	}
}
