<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopicsToMterials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lections', function(Blueprint $table)
		{
			$table->integer('topics_id')->unsigned();
		});
		Schema::table('practicals', function(Blueprint $table)
		{
			$table->integer('topics_id')->unsigned();
			$table->integer('lection_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
