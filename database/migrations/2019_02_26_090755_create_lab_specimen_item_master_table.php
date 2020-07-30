<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabSpecimenItemMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_specimen_item_master', function(Blueprint $table)
		{
			$table->increments('id_lab_specimen_item');
			$table->string('lab_specimen_item_name')->nullable();
			$table->string('lab_specimen_item_code')->nullable()->default('');
			$table->string('lab_specimen_item_note')->nullable()->default('');
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
		Schema::drop('lab_specimen_item_master');
	}

}
