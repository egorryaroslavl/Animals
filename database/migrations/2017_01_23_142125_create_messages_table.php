<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('messages', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->date('date');
		    $table->string( 'name' );
		    $table->string( 'alias' );
		    $table->text( 'description' );
		    $table->string( 'icon' )->nullable();
		    $table->boolean( 'public' )->default( 1 );
		    $table->boolean( 'anons' )->default( 0 );
		    $table->boolean( 'hit' )->default( 0 );
		    $table->integer( 'pos' )->default( 0 );
		    $table->string( 'metatag_title' );
		    $table->string( 'metatag_description' );
		    $table->string( 'metatag_keywords' );
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('messages');
    }
}
