<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabBarcodeMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_barcode_master', function(Blueprint $table)
		{
			$table->increments('id_lab_barcode');
			$table->string('lab_barcode_name')->nullable();
			$table->integer('id_hospital')->nullable();
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
		Schema::drop('lab_barcode_master');
	}

}
