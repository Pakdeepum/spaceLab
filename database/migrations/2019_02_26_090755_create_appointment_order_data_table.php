<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentOrderDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointment_order_data', function(Blueprint $table)
		{
			$table->increments('id_appointment');
			$table->integer('id_lab_order_main')->nullable();
			$table->integer('id_doctor')->nullable();
			$table->dateTime('date_order')->nullable();
			$table->dateTime('date_ts')->nullable();
			$table->integer('status')->nullable()->default(0);
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_user_ts')->nullable();
			$table->string('appointment_for')->nullable();
			$table->string('note')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointment_order_data');
	}

}
