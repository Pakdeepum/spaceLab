<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabResultPhotoDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_result_photo_detail', function(Blueprint $table)
		{
			$table->increments('id_number_photo');
			$table->integer('id_lab_order_main')->nullable();
			$table->integer('height')->nullable();
			$table->integer('width')->nullable();
			$table->string('filename')->nullable();
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
		Schema::drop('lab_result_photo_detail');
	}

}
