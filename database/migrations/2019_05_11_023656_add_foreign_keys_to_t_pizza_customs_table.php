<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTPizzaCustomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_pizza_customs', function(Blueprint $table)
		{
			$table->foreign('p_id', 't_pizza_customs_ibfk_1')->references('p_id')->on('t_pizza')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_pizza_customs', function(Blueprint $table)
		{
			$table->dropForeign('t_pizza_customs_ibfk_1');
		});
	}

}
