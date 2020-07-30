<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHospitalMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hospital_master', function(Blueprint $table)
		{
			$table->increments('id_hospital');
			$table->string('hn_hospital')->nullable();
			$table->string('hospital_name')->nullable();
			$table->string('hospital_address')->nullable();
			$table->string('hospital_tel')->nullable();
			$table->integer('stdel')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hospital_master');
	}

}
