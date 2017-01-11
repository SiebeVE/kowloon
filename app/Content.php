<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Content extends Model {
	use Translatable;

	public $translatedAttributes = [ 'data' ];
}
