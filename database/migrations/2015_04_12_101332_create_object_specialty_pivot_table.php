<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectSpecialtyPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('object_specialty', function(Blueprint $table)
		{
			$table->integer('object_id')->unsigned()->index();
			$table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
			$table->integer('specialty_id')->unsigned()->index();
			$table->foreign('specialty_id')->references('id')->on('specialty')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('object_specialty');
	}

}
