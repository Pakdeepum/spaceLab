<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabSubGroupItemMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_sub_group_item_master', function(Blueprint $table)
		{
			$table->increments('id_lab_sub_group_item');
			$table->string('lab_sub_group_name')->nullable();
			$table->string('lab_sub_group_code')->nullable();
			$table->string('note')->nullable();
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
		Schema::drop('lab_sub_group_item_master');
	}

}
