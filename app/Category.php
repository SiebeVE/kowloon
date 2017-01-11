<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	use Translatable;

	public $translatedAttributes = [ 'name', 'slug' ];

}