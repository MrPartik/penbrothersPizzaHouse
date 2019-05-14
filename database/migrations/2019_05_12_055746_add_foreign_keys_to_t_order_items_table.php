<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_order_items', function(Blueprint $table)
		{
			$table->foreign('p_id', 't_order_items_ibfk_1')->references('p_id')->on('t_pizza')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('o_id', 't_order_items_ibfk_2')->references('o_id')->on('t_orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_order_items', function(Blueprint $table)
		{
			$table->dropForeign('t_order_items_ibfk_1');
			$table->dropForeign('t_order_items_ibfk_2');
		});
	}

}
