<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('practicals', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('title', 255);
			$table->string('slug', 255)->unique();
			$table->text('summary');
      $table->integer('objects_id')->unsigned();
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
		Schema::drop('practicals');
	}

}
