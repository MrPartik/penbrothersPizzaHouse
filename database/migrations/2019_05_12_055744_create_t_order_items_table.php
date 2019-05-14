<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_order_items', function(Blueprint $table)
		{
			$table->bigInteger('oi_id', true)->unsigned();
			$table->bigInteger('o_id')->unsigned()->nullable()->index('o_id');
			$table->bigInteger('p_id')->unsigned()->nullable()->index('p_id');
			$table->integer('oi_sizeCombination')->unsigned()->default(1);
			$table->string('oi_pizaCombination', 100)->nullable();
            $table->float('oi_totalAmount', 10)->nullable();
			$table->string('oi_toppings', 100)->nullable();
			$table->integer('oi_qty')->unsigned()->default(1);
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
		Schema::drop('t_order_items');
	}

}
