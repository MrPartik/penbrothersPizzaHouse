<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRPizzaInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('r_pizza_information', function(Blueprint $table)
		{
			$table->foreign('pt_id', 'r_pizza_information_ibfk_1')->references('pt_id')->on('r_pizza_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('r_pizza_information', function(Blueprint $table)
		{
			$table->dropForeign('r_pizza_information_ibfk_1');
		});
	}

}
