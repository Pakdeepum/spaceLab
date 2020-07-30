<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQcLevelMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qc_level_master', function(Blueprint $table)
		{
			$table->increments('id_qc_level');
			$table->string('qc_level')->nullable();
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
		Schema::drop('qc_level_master');
	}

}
