<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_pizza', function(Blueprint $table)
		{
			$table->bigInteger('p_id', true)->unsigned();
			$table->bigInteger('pi_id')->unsigned()->index('pi_id');
			$table->bigInteger('ps_id')->unsigned()->index('ps_id');
			$table->float('p_price', 10)->default(0.00);
			$table->boolean('stats')->default(1);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_pizza');
	}

}
