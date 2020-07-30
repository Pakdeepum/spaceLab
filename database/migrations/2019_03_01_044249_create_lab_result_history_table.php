<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabResultHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_result_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_detail_id')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('lab_approve')->nullable();
            $table->integer('user_approve')->nullable();
            $table->string('item_id')->nullable();
            $table->integer('repeat')->nullable();
            $table->dateTime('created_at')->nullable();
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
        Schema::dropIfExists('lab_result_history');
    }
}
