<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTPizzaCustomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_pizza_customs', function(Blueprint $table)
		{
			$table->bigInteger('pc_id', true)->unsigned();
			$table->string('pc_name', 50);
			$table->bigInteger('p_id')->unsigned()->index('p_id');
			$table->integer('pc_sizeCombination')->default('1')->unsigned(); //'1','2','4','6'
			$table->string('pc_pizaCombination', 100)->nullable();
			$table->string('pc_toppings', 100);
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
		Schema::drop('t_pizza_customs');
	}

}
