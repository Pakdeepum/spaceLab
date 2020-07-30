<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabOrderMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_order_main', function(Blueprint $table)
		{
			$table->increments('id_lab_order_main');
			$table->string('lab_order_no')->nullable();
			$table->integer('VN')->nullable();
			$table->dateTime('date_ts')->nullable();
			$table->integer('id_department')->nullable();
			$table->integer('id_service_plan')->nullable();
			$table->integer('id_clinic')->nullable();
			$table->integer('id_patient')->nullable();
			$table->integer('id_doctor')->nullable();
			$table->integer('id_sevice_point')->nullable();
			$table->integer('id_user')->nullable();
			$table->float('temperature', 10, 0)->nullable();
			$table->float('bp_low', 10, 0)->nullable();
			$table->float('bp_high', 10, 0)->nullable();
			$table->float('pulse', 10, 0)->nullable();
			$table->dateTime('order_date')->nullable();
			$table->integer('order_id_user')->nullable();
			$table->dateTime('receive_date')->nullable();
			$table->integer('receive_id_user')->nullable();
			$table->dateTime('correct_date')->nullable();
			$table->integer('correct_id_user')->nullable();
			$table->integer('id_appointment')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('total_price', 10, 0)->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->integer('status')->nullable()->default(0);
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_lab_form')->nullable();
			$table->integer('id_ward')->nullable();
			$table->string('note')->nullable();
			$table->integer('id_hospital_send')->nullable();
			$table->integer('id_hospital')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lab_order_main');
	}

}
