<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiCallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('api_calls', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('api_key_id')->unsigned();
            $table->foreign('api_key_id')->references('id')->on('api_keys');
            $table->string('ip');
            $table->string('email')->nullable();
            $table->boolean('valid_email')->nullable();
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
        Schema::drop('api_calls');
	}

}
