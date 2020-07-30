<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabOrderDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_order_detail', function(Blueprint $table)
		{
			$table->increments('id_lab_order_detail');
			$table->integer('id_lab_order_main')->nullable();
			$table->integer('id_lab_item')->nullable();
			$table->string('lab_result')->nullable()->default('-');
			$table->string('lab_result_repeat')->nullable()->default('-');
			$table->dateTime('process_date')->nullable();
			$table->dateTime('report_date')->nullable();
			$table->integer('report_id_user')->nullable();
			$table->dateTime('approve_date')->nullable();
			$table->integer('approve_id_user')->nullable();
			$table->dateTime('edit_date')->nullable();
			$table->integer('edit_id_user')->nullable();
			$table->integer('cancel_approve_id_user')->nullable();
			$table->dateTime('cancel_approve_date')->nullable();
			$table->integer('edit_approve_id_user')->nullable();
			$table->dateTime('edit_approve_date')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->float('total_price', 10, 0)->nullable();
			$table->integer('id_lab_specimen_item')->nullable();
			$table->integer('result_flag')->nullable()->default(0)->comment('1ต่ำ 2ปกติ 3สูง');
			$table->integer('repeat_flag')->nullable()->default(0)->comment('0 no repeat 1 repeat');
			$table->dateTime('repeat_date')->nullable();
			$table->dateTime('transfer_date')->nullable();
			$table->integer('critical_flag')->nullable()->default(0);
			$table->integer('tat')->nullable()->default(60);
			$table->integer('priority')->nullable()->default(1);
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('status')->nullable()->default(0);
			$table->string('normal_range')->nullable();
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
		Schema::drop('lab_order_detail');
	}

}
