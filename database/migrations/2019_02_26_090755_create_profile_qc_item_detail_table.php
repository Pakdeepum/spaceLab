<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileQcItemDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_qc_item_detail', function(Blueprint $table)
		{
			$table->increments('id_qc_profile_detail');
			$table->integer('id_profile_qc_main')->nullable();
			$table->integer('id_item_qc')->nullable();
			$table->float('mean', 255, 0)->nullable()->default(0);
			$table->float('sd', 255, 0)->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_qc_item_detail');
	}

}
