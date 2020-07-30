<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriticalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critical', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reciver_name')->nullable();
            $table->string('report_name')->nullable();
            $table->string('department')->nullable();
            $table->integer('status')->nullable();
            $table->text('cause')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('order_main_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('critical');
    }
}
