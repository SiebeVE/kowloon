<?php

namespace App\Http\Controllers;

use App\Category;
use App\Faq;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends BaseController {
	public function __construct() {
		$this->middleware( 'login', [ "except" => [ "getProductOverview", "getProductDetail" ] ] );
		parent::__construct();
	}

	public function getProductOverview( Category $category ) {
		$tagsOfProducts = $category->tags( $category->id );
		$productsTotal  = $category->products;

		$products = $productsTotal;

		return view( 'products.overview', [
			"category"    => $category,
			"productList" => $products,
			"counting"    => [
				"total"    => count( $productsTotal ),
				"filtered" => count( $products ),
			],
			"tags"        => $tagsOfProducts,
		] );
	}

	public function getProductDetail( Category $category, Product $product ) {
		$relatedProducts = Product::where( 'id', '!=', $product->id )->inRandomOrder()->take( 4 )->get();

		return view( 'products.detail', [
			"category" => $category,
			"product"  => $product,
			"related"  => $relatedProducts,
		] );
	}

	public function getProductsCreate() {
		$tags       = Tag::get();
		$faqs       = Faq::get();
		$categories = Category::get();

		if ( count( $tags ) === 0 ) {
			flashToastr( "error", "No tag yet", "You can't create a product before you created the tag..." );

			return redirect()->route( 'admin-tag-create' );
		}

		if ( count( $faqs ) === 0 ) {
			flashToastr( "error", "No faq yet", "You can't create a product before you created the faq..." );

			return redirect()->route( 'admin-faq-create' );
		}

		return view( 'admin.products.create', [
			"tags"       => $tags,
			"faqs"       => $faqs,
			"categories" => $categories,
		] );
	}

	public function postProductsCreate( Request $request ) {
		$inputs = $this->validateAndReturnInput( $request, 'create' );
		if ( ! is_array( $inputs ) ) {
			return $inputs;
		}

		$product              = new Product();
		$product->category_id = $request->category;
		$product->price       = $request->price;
		$product->colors      = $request->colors;
		$product->save();

		$product->faqs()->sync( $request->faqs );
		$product->tags()->sync( $request->tags );

		$this->updateProductTranslations( $product, $inputs );

		foreach ( $request->images as $image ) {
			$product->addMedia( $image )->toMediaLibrary();
		}

		flashToastr( "success", "Product added", "The product is successfully added" );

		return redirect()->route( 'admin-product-create' );
	}

	public function getProductsView() {
		$products = Product::get()->groupBy( 'category_id' );

		return view( 'admin.products.view', [ "productsGr" => $products ] );
	}

	public function getProductsEdit( Product $product ) {
		$tags       = Tag::get();
		$faqs       = Faq::get();
		$categories = Category::get();

		if ( count( $tags ) === 0 ) {
			flashToastr( "error", "No tag yet", "You can't create a product before you created the tag..." );

			return redirect()->route( 'admin-tag-create' );
		}

		if ( count( $faqs ) === 0 ) {
			flashToastr( "error", "No faq yet", "You can't create a product before you created the faq..." );

			return redirect()->route( 'admin-faq-create' );
		}

		return view( 'admin.products.create', [
			"tags"       => $tags,
			"faqs"       => $faqs,
			"categories" => $categories,
			"product"    => $product,
		] );
	}

	public function postProductsEdit( Request $request, Product $product ) {
		$inputs = $this->validateAndReturnInput( $request, 'edit', true );
		if ( ! is_array( $inputs ) ) {
			return $inputs;
		}

		$product->category_id = $request->category;
		$product->price       = $request->price;
		$product->colors      = $request->colors;
		$product->save();

		$product->faqs()->sync( $request->faqs );
		$product->tags()->sync( $request->tags );

		$this->updateProductTranslations( $product, $inputs );

		if ( $request->hasFile( 'images' ) ) {
			foreach ( $request->images as $image ) {
				$product->clearMediaCollection();
				$product->addMedia( $image )->toMediaLibrary();
			}
		}

		flashToastr( "success", "Product edited", "The product is successfully edited" );

		return redirect()->route( 'admin-product-view' );
	}

	public function getProductsDelete( Product $product ) {
		$tags       = Tag::get();
		$faqs       = Faq::get();
		$categories = Category::get();

		if ( count( $tags ) === 0 ) {
			flashToastr( "error", "No tag yet", "You can't create a product before you created the tag..." );

			return redirect()->route( 'admin-tag-create' );
		}

		if ( count( $faqs ) === 0 ) {
			flashToastr( "error", "No faq yet", "You can't create a product before you created the faq..." );

			return redirect()->route( 'admin-faq-create' );
		}

		return view( 'admin.products.delete', [
			"tags"       => $tags,
			"faqs"       => $faqs,
			"categories" => $categories,
			"product"    => $product,
		] );
	}

	public function postProductsDelete( Request $request, Product $product ) {
		if ( $product->hot_item != 0 ) {
			flashToastr( 'error', "Product is hot", "The product you want to delete is a hot item, first change this, then try again" );

			return redirect()->route( 'admin-dashboard' );
		}
		$product->delete();
		flashToastr( "success", "Product deleted", "The product has been successfully deleted!" );

		return redirect()->route( 'admin-product-view' );
	}

	private function validateAndReturnInput( Request $request, $toPage, $ignoreUnique = false ) {
		$toValidate  = [
			"category" => "required|exists:categories,id",
			"tags"     => "required|array",
			"faqs"     => "required|array",
			"colors"   => "required|array",
			"price"    => 'required|min:0',
		];
		$inputFields = [
			"name"        => "required" . ( $ignoreUnique ? "" : "|unique:product_translations,name" ),
			"description" => "required",
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
				->back()
				->withErrors( $validator )
				->withInput();
		} else if ( count( $toValidate ) === 0 ) {
			abort( 400, "You messed with my field, you bastard!" );
		}

		return $inputs;
	}

	private function updateProductTranslations( Product $product, $input ) {
		foreach ( $input as $field => $data ) {
			foreach ( $data as $locale => $input ) {
				$product->translateOrNew( $locale )->{$field} = $input;
			}
		}

		return $product->save();
	}
}
