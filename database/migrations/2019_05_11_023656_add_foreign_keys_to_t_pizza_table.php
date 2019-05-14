<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_pizza', function(Blueprint $table)
		{
			$table->foreign('pi_id', 't_pizza_ibfk_1')->references('pi_id')->on('r_pizza_information')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ps_id', 't_pizza_ibfk_2')->references('ps_id')->on('r_pizza_sizes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_pizza', function(Blueprint $table)
		{
			$table->dropForeign('t_pizza_ibfk_1');
			$table->dropForeign('t_pizza_ibfk_2');
		});
	}

}
