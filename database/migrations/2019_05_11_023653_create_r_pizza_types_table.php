<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRPizzaTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_pizza_types', function(Blueprint $table)
		{
			$table->bigInteger('pt_id', true)->unsigned();
			$table->string('pt_title', 50);
			$table->string('pt_desc', 50)->default('None');
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
		Schema::drop('r_pizza_types');
	}

}
