<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('district', function(Blueprint $table)
		{
			$table->increments('district_id');
			$table->string('district_code', 6);
			$table->string('district_name', 150);
			$table->integer('amphur_id')->default(0);
			$table->integer('province_id')->default(0);
			$table->integer('geo_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('district');
	}

}
