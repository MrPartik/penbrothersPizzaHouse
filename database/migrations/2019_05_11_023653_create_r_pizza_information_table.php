<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRPizzaInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_pizza_information', function(Blueprint $table)
		{
			$table->bigInteger('pi_id', true)->unsigned();
			$table->bigInteger('pt_id')->unsigned()->index('pt_id');
			$table->string('pi_title', 100);
			$table->text('pi_desc', 65535)->nullable();
			$table->text('pi_img', 65535)->nullable();
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
		Schema::drop('r_pizza_information');
	}

}
