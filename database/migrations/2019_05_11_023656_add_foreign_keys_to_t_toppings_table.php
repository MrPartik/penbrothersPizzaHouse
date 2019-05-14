<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTToppingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_toppings', function(Blueprint $table)
		{
			$table->foreign('pts_id', 't_toppings_ibfk_1')->references('pts_id')->on('r_pizza_toppings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ps_id', 't_toppings_ibfk_2')->references('ps_id')->on('r_pizza_sizes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_toppings', function(Blueprint $table)
		{
			$table->dropForeign('t_toppings_ibfk_1');
			$table->dropForeign('t_toppings_ibfk_2');
		});
	}

}
