<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia {
	use Translatable;
	use HasMediaTrait;

	protected $fillable = ["colors"];

	public $translatedAttributes = [ 'name', 'slug', 'description' ];
	protected $appends = [ 'faq_ids', 'tag_ids' ];

	public function faqs() {
		return $this->belongsToMany( 'App\Faq' );
	}

	public function getFaqIdsAttribute() {
		return $this->faqs->pluck( 'pivot.faq_id' )->toArray();
	}

	public function setColorsAttribute( $value ) {
		$this->attributes['colors'] = serialize( $value );
	}

	public function getPriceAttribute($value) {
		return number_format((float)$value, 2, ',', '');
	}

	public function getColorsAttribute($value) {
		return unserialize( $value );
	}

	public function category() {
		return $this->belongsTo( 'App\Category' );
	}

	public function tags() {
		return $this->belongsToMany( 'App\Tag' );
	}

	public function getTagIdsAttribute() {
		return $this->tags->pluck( 'pivot.tag_id' )->toArray();
	}
}
