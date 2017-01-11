<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsWithTranslations extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'products', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'category_id' )->unsigned();
			$table->double( 'price', 15, 2 );
			$table->text( 'colors' );
			$table->timestamps();

			$table->foreign( 'category_id' )
			      ->references( 'id' )
			      ->on( 'categories' )
			      ->onDelete( 'cascade' );
		} );

		Schema::create( 'product_translations', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'product_id' )->unsigned();
			$table->string( 'locale' )->index();

			$table->string( "name" );
			$table->text( "specifications" )->nullable();
			$table->text( "description" )->nullable();

			$table->unique( [ 'product_id', 'locale' ] );
			$table->foreign( 'product_id' )
			      ->references( 'id' )
			      ->on( 'products' )
			      ->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'product_translations' );
		Schema::dropIfExists( 'products' );
	}
}
