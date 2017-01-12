<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller {
	public function __construct() {
		$this->middleware( 'login' );
	}

	public function getFaqsCreate() {
		return view( 'admin.faqs.create' );
	}

	public function postFaqsCreate( Request $request ) {
		$inputs = $this->validateAndReturnInput( $request, 'create' );

		$faq = new Faq();
		$faq->save();

		$this->updateTagTranslations( $faq, $inputs );

		flashToastr( "success", "Faq added", "The faq is successfully added" );

		return redirect()->route( 'admin-faq-create' );
	}

	public function getFaqsView() {
		$faqs = Faq::get();

		return view( 'admin.faqs.view', compact( "faqs" ) );
	}

	public function getFaqsEdit( Faq $faq ) {
		return view( 'admin.faqs.create', compact( "faq" ) );
	}

	public function postFaqsEdit( Request $request, Faq $faq ) {
		$inputs = $this->validateAndReturnInput( $request, 'edit', true );
		if ( ! is_array( $inputs ) ) {
			return $inputs;
		}
		$this->updateTagTranslations( $faq, $inputs );
		flashToastr( "success", "Faq edited", "The faq is successfully edited" );

		return redirect()->route( 'admin-faq-view' );
	}

	public function getFaqsDelete( Faq $faq ) {
		return view( 'admin.faqs.delete', compact( "faq" ) );
	}

	public function postFaqsDelete( Faq $faq ) {
		$faq->delete();
		flashToastr( "success", "Faq deleted", "The faq has been successfully deleted!" );

		return redirect()->route( 'admin-faq-view' );
	}

	private function validateAndReturnInput( Request $request, $toPage, $ignoreUnique = false ) {
		$toValidate  = [];
		$inputFields = [
			"question" => "required" . ( $ignoreUnique ? "" : "|unique:faq_translations,question" ),
			"answer"   => "required",
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
				->route( 'admin-faq-' . $toPage )
				->withErrors( $validator )
				->withInput();
		} else if ( count( $toValidate ) === 0 ) {
			abort( 400, "You messed with my field, you bastard!" );
		}

		return $inputs;
	}

	private function updateTagTranslations( Faq $faq, $input ) {
		foreach ( $input as $field => $data ) {
			foreach ( $data as $locale => $input ) {
				$faq->translateOrNew( $locale )->{$field} = $input;
			}
		}

		return $faq->save();
	}
}
