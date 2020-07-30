<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQcOrderDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qc_order_detail', function(Blueprint $table)
		{
			$table->increments('id_qc_profile_order_detail');
			$table->integer('id_qc_profile_order')->nullable();
			$table->integer('id_item_qc')->nullable();
			$table->float('result', 10, 0)->nullable();
			$table->string('comment')->nullable();
			$table->integer('id_username')->nullable();
			$table->integer('analyzer')->nullable()->default(0);
			$table->dateTime('updated_at')->nullable();
			$table->integer('analyzer_id')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qc_order_detail');
	}

}
