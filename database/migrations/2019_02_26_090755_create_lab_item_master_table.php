<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabItemMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_item_master', function(Blueprint $table)
		{
			$table->increments('id_lab_item');
			$table->string('lab_item_name')->nullable();
			$table->string('lab_item_code')->nullable();
			$table->string('lab_item_unit')->nullable();
			$table->string('lab_default_value')->nullable()->default('-');
			$table->integer('id_lab_item_sub_group')->nullable()->default(0);
			$table->integer('possible_value_flag')->nullable();
			$table->integer('critical_value_flag')->nullable();
			$table->integer('tat_default')->nullable()->default(60);
			$table->string('note')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->float('mean_normal', 255, 0)->nullable()->default(0);
			$table->float('sd_normal', 255, 0)->nullable()->default(0);
			$table->integer('status')->nullable()->default(0);
			$table->integer('id_hospital')->nullable();
			$table->string('lab_normal_value')->nullable()->default('-');
			$table->string('lab_male_normal_value')->nullable()->default('-');
			$table->string('lab_female_normal_value')->nullable()->default('-');
			$table->string('lab_child_normal_value')->nullable()->default('-');
			$table->string('lab_pad_normal_value')->nullable();
			$table->integer('id_group_barcode')->nullable();
			$table->integer('id_group_result')->nullable();
			$table->integer('id_lab_barcode')->nullable();
			$table->integer('id_Item_type')->nullable();
			$table->integer('id_lab_specimen_item')->nullable();
			$table->string('hint')->nullable();
			$table->string('thai_name')->nullable();
			$table->string('eng_name')->nullable();
			$table->string('critical_value')->nullable();
			$table->integer('out_lab')->nullable();			
			$table->integer('_decimal')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lab_item_master');
	}

}
