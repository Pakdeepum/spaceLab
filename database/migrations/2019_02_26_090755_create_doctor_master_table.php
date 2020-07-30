<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor_master', function(Blueprint $table)
		{
			$table->increments('id_doctor');
			$table->integer('doctor_prefix')->nullable();
			$table->string('doctor_name')->nullable();
			$table->string('doctor_lastname')->nullable();
			$table->string('doctor_department')->nullable();
			$table->integer('doctor_position')->nullable();
			$table->string('doctor_tel')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('doctor_specialty')->nullable();
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
		Schema::drop('doctor_master');
	}

}
