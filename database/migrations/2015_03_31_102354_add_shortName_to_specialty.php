<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShortNameToSpecialty extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('specialty', function($table)
    {
        $table->string('short_name');
        $table->string('icon_class');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('specialty', function($table)
{
    $table->dropColumn('short_name');
  $table->dropColumn('icon_class');
});
	}

}
