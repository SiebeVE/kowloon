<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguagesToEmails extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'emails', function ( Blueprint $table ) {
			$table->string( 'locale', 2 )->after( 'email' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'emails', function ( Blueprint $table ) {
			$table->dropColumn( 'locale' );
		} );
	}
}
