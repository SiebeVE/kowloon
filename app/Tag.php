<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

	public $translatedAttributes = ['name', 'slug'];

	public function products() {
		return $this->belongsToMany('App\Product');
	}
}
