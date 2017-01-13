<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryTranslation;
use App\Email;
use App\Faq;
use App\Notifications\ContactMessage;
use App\Notifications\Subscribed;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
		$hotItems = Product::where( 'hot_item', '!=', 0 )->get();

		return view( 'home', [
			"hotItems" => $hotItems
		] );
	}

	public function postHome( Request $request ) {
		$toValidate = [
			"email" => "required|email"
		];

		$this->validate( $request, $toValidate );

		$locale         = LaravelLocalization::getCurrentLocale();
		$emails         = Email::firstOrCreate( [
			"email" => $request->email,
		] );
		$emails->locale = $locale;
		$emails->save();

		if ( $emails->wasRecentlyCreated ) {
			$emails->notify( new Subscribed() );
		}

		flashToastr( "success", trans( "toastr.subscribed" ), trans( "toastr.subscribed_content" ) );

		return redirect()->back();
	}

	/**
	 * Show the about us page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getAboutUs() {
		$faqs = Faq::get();

		return view( 'about-us', [
			"faqs" => $faqs,
		] );
	}

	public function postAboutUs( Request $request ) {
		$toValidate = [
			"email"   => "required|email",
			"message" => "required|min:20",
		];

		$this->validate( $request, $toValidate );

		foreach ( User::get() as $user ) {
			$user->notify( new ContactMessage( $request->email, $request->message ) );
		}

		flashToastr( "success", trans( 'toastr.contact_title', [], NULL, getLocale() ), trans( 'toastr.contact_content', [], NULL, getLocale() ) );

		return redirect()->route( 'about-us' );
	}
}
