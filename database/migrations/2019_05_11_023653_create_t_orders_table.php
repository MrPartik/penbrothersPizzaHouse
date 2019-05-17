<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_orders', function(Blueprint $table)
		{
			$table->bigInteger('o_id', true)->unsigned();
			$table->bigInteger('u_id')->unsigned()->nullable()->index('u_id');
            $table->string('o_guest_id', 50)->nullable();
			$table->string('o_transCode', 50);
			$table->string('o_payTransCode', 50)->nullable();
			$table->string('o_payID', 50)->nullable();
			$table->string('o_verficationCode', 100)->nullable();
			$table->dateTime('o_deliverAt')->default(Carbon\Carbon::now()->toDateTimeString());
			$table->string('o_fromEmail', 50)->nullable();
			$table->string('o_fromPhone', 50)->nullable();
			$table->string('o_fromName', 50)->nullable();
			$table->string('o_toAddress', 100)->nullable();
			$table->string('o_toStreet', 100)->nullable();
			$table->string('o_toHouseNo', 10)->nullable();
			$table->string('o_toBarangay', 100)->nullable();
			$table->string('o_toCity', 100)->nullable();
			$table->string('o_toProvince', 100)->nullable();
			$table->string('o_toLandmark', 500)->nullable();
			$table->string('o_toNote', 500)->nullable();
			$table->string('o_toZipCode', 10)->nullable();
			$table->float('o_totalAmount', 10)->nullable();
			$table->string('o_status',50)->default('Verification'); //'Verification','Preparing','Void','OnBoard','Delivered'
			$table->dateTime('o_preparing_at')->nullable();
			$table->dateTime('o_void_at')->nullable();
			$table->dateTime('o_onBoard_at')->nullable();
			$table->dateTime('o_paid_at')->nullable();
			$table->dateTime('o_delivered_at')->nullable();
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
		Schema::drop('t_orders');
	}

}
