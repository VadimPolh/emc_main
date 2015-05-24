<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypesToAttachment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attachments', function(Blueprint $table)
		{
			$table->integer('lections_id')->unsigned();
			$table->integer('practicals_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('attachments',function(Blueprint $table){
			$table->dropColumn('lections_id');
			$table->dropColumn('practicals_id');
		});
	}

}
