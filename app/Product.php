<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Translatable;

	public $translatedAttributes = ['name', 'slug'];
}
