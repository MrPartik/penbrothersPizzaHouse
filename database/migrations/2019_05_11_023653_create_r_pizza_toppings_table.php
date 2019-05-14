<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRPizzaToppingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_pizza_toppings', function(Blueprint $table)
		{
			$table->bigInteger('pts_id', true)->unsigned();
			$table->string('pts_title', 50);
			$table->string('pts_desc', 50)->default('None');
			$table->text('pts_img', 65535)->nullable();
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
		Schema::drop('r_pizza_toppings');
	}

}
