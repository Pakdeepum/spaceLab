<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_master', function(Blueprint $table)
		{
			$table->increments('id_patient');
			$table->string('hn')->nullable();
			$table->string('patient_firstname')->nullable();
			$table->string('patient_lastname')->nullable();
			$table->integer('prefix_name')->nullable();
			$table->date('birthday')->nullable();
			$table->string('age')->nullable();
			$table->string('patient_address')->nullable();
			$table->integer('patient_district')->nullable();
			$table->integer('patient_amphur')->nullable();
			$table->integer('patient_province')->nullable();
			$table->string('patient_zipcode')->nullable();
			$table->string('blood_group')->nullable();
			$table->integer('ethnicity')->nullable();
			$table->integer('nationality')->nullable();
			$table->integer('clinic')->nullable();
			$table->string('drug_allergy')->nullable();
			$table->string('father_name')->nullable();
			$table->string('mother_name')->nullable();
			$table->dateTime('regis_date')->nullable();
			$table->string('patient_tel')->nullable();
			$table->string('inform_name')->nullable();
			$table->string('inform_relate')->nullable();
			$table->string('inform_tel')->nullable();
			$table->integer('marital_status')->nullable()->default(0)->comment('1 = โสด
2 = สมรส
3 = หม้าย
4 = หย่า
5 = แยกกันอยู่');
			$table->integer('patient_religion')->nullable();
			$table->integer('gender')->nullable()->comment('1 = ชาย , 2 = หญิง');
			$table->string('citizenid')->nullable();
			$table->integer('private_docter_id')->nullable();
			$table->string('patient_email')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->dateTime('last_update')->nullable();
			$table->integer('patient_type')->nullable();
			$table->float('weight', 10, 0)->nullable();
			$table->float('height', 10, 0)->nullable();
			$table->integer('id_hospital')->nullable();
			$table->integer('id_user')->nullable();
			$table->string('image')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_master');
    }
}
