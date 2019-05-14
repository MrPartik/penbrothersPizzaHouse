<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRSavedDeliveryInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_saved_delivery_information', function(Blueprint $table)
		{
			$table->bigInteger('sa_id', true)->unsigned();
			$table->bigInteger('u_id')->unsigned()->index('u_id');
			$table->string('sa_address', 100);
			$table->string('sa_houseNo', 5);
			$table->string('sa_barangay', 100);
			$table->string('sa_city', 100);
			$table->string('sa_zipCode', 10);
			$table->string('sa_Phone', 20)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('stats')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('r_saved_delivery_information');
	}

}
