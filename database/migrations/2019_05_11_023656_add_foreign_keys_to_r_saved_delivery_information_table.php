<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRSavedDeliveryInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('r_saved_delivery_information', function(Blueprint $table)
		{
			$table->foreign('u_id', 'r_saved_delivery_information_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('r_saved_delivery_information', function(Blueprint $table)
		{
			$table->dropForeign('r_saved_delivery_information_ibfk_1');
		});
	}

}
