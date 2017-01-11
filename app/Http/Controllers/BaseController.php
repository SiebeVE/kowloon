<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
	public function __construct()
	{
		$categories = Category::get();
		// Sharing is caring
		View::share('categories', $categories);
	}
}
