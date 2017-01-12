<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller {
	public function __construct() {
		$this->middleware( 'login' );
	}

	public function getTagsCreate() {
		return view( 'admin.tags.create' );
	}

	public function postTagsCreate( Request $request ) {
		$inputs = $this->validateAndReturnInput( $request, 'create' );

		$tag = new Tag();
		$tag->save();

		$this->updateTagTranslations( $tag, $inputs );

		flashToastr( "success", "Tag added", "The tag is successfully added" );

		return redirect()->route( 'admin-tag-create' );
	}

	public function getTagsView() {
		$tags = Tag::get();

		return view( 'admin.tags.view', compact( "tags" ) );
	}

	public function getTagsEdit( Tag $tag ) {
		return view( 'admin.tags.create', compact( "tag" ) );
	}

	public function postTagsEdit( Request $request, Tag $tag ) {
		$inputs = $this->validateAndReturnInput( $request, 'edit', true );
		if ( ! is_array( $inputs ) ) {
			return $inputs;
		}
		$this->updateTagTranslations( $tag, $inputs );
		flashToastr( "success", "Tag edited", "The tag is successfully edited" );

		return redirect()->route( 'admin-tag-view' );
	}

	public function getTagsDelete( Tag $tag ) {
		return view( 'admin.tags.delete', compact( "tag" ) );
	}

	public function postTagsDelete( Tag $tag ) {
		$tag->delete();
		flashToastr( "success", "Tag deleted", "The tag has been successfully deleted!" );

		return redirect()->route( 'admin-tag-view' );
	}

	private function validateAndReturnInput( Request $request, $toPage, $ignoreUnique = false ) {
		$toValidate  = [];
		$inputFields = [
			"name" => "required" . ( $ignoreUnique ? "" : "|unique:tag_translations,name" ),
		];
		$inputs      = [];
		$locales     = getSupportedLocales();
		foreach ( $inputFields as $field => $validationRule ) {
			$inputs[ $field ] = [];
			foreach ( $locales as $localCode => $properties ) {
				$inputName                      = $field . "-" . $localCode;
				$inputs[ $field ][ $localCode ] = $request[ $inputName ];
				$toValidate[ $inputName ]       = $validationRule;
			}
		}

		$validator = Validator::make( $request->all(), $toValidate );

		if ( $validator->fails() ) {
			return redirect()
				->route( 'admin-tag-' . $toPage )
				->withErrors( $validator )
				->withInput();
		} else if ( count( $toValidate ) === 0 ) {
			abort( 400, "You messed with my field, you bastard!" );
		}

		return $inputs;
	}

	private function updateTagTranslations( Tag $tag, $input ) {
		foreach ( $input as $field => $data ) {
			foreach ( $data as $locale => $input ) {
				$tag->translateOrNew( $locale )->{$field} = $input;
			}
		}

		return $tag->save();
	}
}
