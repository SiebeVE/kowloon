<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller {
	public function __construct() {
		$this->middleware( 'login' );
	}

	public function getTagsCreate() {
		return view( 'admin.tags.create' );
	}

	public function postTagsCreate( Request $request ) {

	}
}
