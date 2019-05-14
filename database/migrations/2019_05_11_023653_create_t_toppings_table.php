<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTToppingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_toppings', function(Blueprint $table)
		{
			$table->bigInteger('t_id', true)->unsigned();
			$table->bigInteger('pts_id')->unsigned()->index('pts_id');
			$table->bigInteger('ps_id')->unsigned()->index('ps_id');
			$table->float('t_price', 10)->default(0.00);
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
		Schema::drop('t_toppings');
	}

}
