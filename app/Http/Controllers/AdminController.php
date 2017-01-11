<?php

namespace App\Http\Controllers;

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
		return view( 'admin.dashboard' );
	}
}
