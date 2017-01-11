<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesWithTranslations extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'categories', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'css' );
			$table->timestamps();
		} );

		Schema::create( 'category_translations', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'category_id' )->unsigned();
			$table->string( 'locale' )->index();

			$table->string( "name" );
			$table->string( 'slug' )->index()->unique();

			$table->unique( [ 'category_id', 'locale' ] );
			$table->foreign( 'category_id' )
			      ->references( 'id' )
			      ->on( 'categories' )
			      ->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'category_translations' );
		Schema::dropIfExists( 'categories' );
	}
}
