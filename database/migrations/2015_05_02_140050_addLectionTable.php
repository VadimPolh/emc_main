<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lections', function($table)
    {
      $table->increments('id');
			$table->timestamps();
			$table->string('title', 255);
			$table->string('slug', 255)->unique();
			$table->text('summary');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lections');
	}

}
