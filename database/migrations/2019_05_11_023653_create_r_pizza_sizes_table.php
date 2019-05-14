<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRPizzaSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_pizza_sizes', function(Blueprint $table)
		{
			$table->bigInteger('ps_id', true)->unsigned();
			$table->float('ps_size', 5);
			$table->string('ps_desc', 50)->default('None');
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
		Schema::drop('r_pizza_sizes');
	}

}
