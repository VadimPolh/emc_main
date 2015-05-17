<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToSpecialtyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::table('specialty', function(Blueprint $table)
//		{
//			$table->string('slug', 255);
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('specialty', function(Blueprint $table)
		{
			$table->dropColumn('slug');
		});
	}

}
