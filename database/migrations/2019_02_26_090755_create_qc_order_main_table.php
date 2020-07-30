<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQcOrderMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qc_order_main', function(Blueprint $table)
		{
			$table->increments('id_qc_profile_order');
			$table->integer('id_qc_profile_main')->nullable();
			$table->date('qc_test_date')->nullable();
			$table->time('qc_test_time')->nullable();
			$table->integer('id_user_qc')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_username')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qc_order_main');
	}

}
