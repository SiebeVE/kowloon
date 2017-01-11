<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsWithTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

	    Schema::create( 'faq_translations', function ( Blueprint $table ) {
		    $table->increments( 'id' );
		    $table->integer( 'faq_id' )->unsigned();
		    $table->string( 'locale' )->index();

		    $table->string( "question" );
		    $table->text( "answer" );

		    $table->unique( [ 'faq_id', 'locale' ] );
		    $table->foreign( 'faq_id' )
		          ->references( 'id' )
		          ->on( 'faqs' )
		          ->onDelete( 'cascade' );
	    } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_translations');
        Schema::dropIfExists('faqs');
    }
}
