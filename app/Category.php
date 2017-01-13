<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model {
	use Translatable;

	public $translatedAttributes = [ 'name', 'slug' ];

	public function products() {
		return $this->hasMany( 'App\Product' );
	}

	public function tags($category_id) {
		$tags = DB::table( 'tags' )
		          ->join( 'product_tag', 'tags.id', '=', 'product_tag.tag_id' )
		          ->join( 'products', 'product_tag.product_id', '=', 'products.id' )
		          ->join( 'categories', 'products.category_id', '=', 'categories.id' )
		          ->where( 'categories.id', $category_id )
		          ->groupBy( 'tags.id' )
		          ->select( 'tags.id' )->get();
		return Tag::find($tags->pluck('id')->toArray());
	}

}
