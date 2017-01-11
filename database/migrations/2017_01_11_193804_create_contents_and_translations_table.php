<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsAndTranslationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'contents', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'key_human' )->unique();
			$table->timestamps();
		} );

		Schema::create( 'content_translations', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'content_id' )->unsigned();
			$table->string( 'locale' )->index();

			$table->string( "data" );

			$table->unique( [ 'content_id', 'locale' ] );
			$table->foreign( 'content_id' )
			      ->references( 'id' )
			      ->on( 'contents' )
			      ->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'content_translations' );
		Schema::dropIfExists( 'contents' );
	}
}
