<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecimenItemRejectOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specimen_item_reject_order', function(Blueprint $table)
		{
			$table->increments('id_specimen_item_reject');
			$table->integer('id_specimen_item_reject_note')->nullable();
			$table->integer('id_specimen_item')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->dateTime('specimen_item_reject_date')->nullable();
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
		Schema::drop('specimen_item_reject_order');
	}

}
