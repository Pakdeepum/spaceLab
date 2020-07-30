<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileQcMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_qc_master', function(Blueprint $table)
		{
			$table->increments('id_profile_qc');
			$table->string('profile_name')->nullable();
			$table->integer('id_department')->nullable();
			$table->integer('id_qc_name')->nullable();
			$table->integer('id_qc_level')->nullable();
			$table->string('lot_number')->nullable();
			$table->integer('id_user_create')->nullable();
			$table->dateTime('date_create')->nullable();
			$table->integer('id_user_modify')->nullable();
			$table->dateTime('date_modify')->nullable();
			$table->integer('stdel')->nullable()->default(0);
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
		Schema::drop('profile_qc_master');
	}

}
