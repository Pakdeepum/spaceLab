<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecimenItemRejectNoteMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specimen_item_reject_note_master', function(Blueprint $table)
		{
			$table->increments('id_specimen_item_reject_note');
			$table->string('specimen_item_reject_note')->nullable();
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
		Schema::drop('specimen_item_reject_note_master');
	}

}
