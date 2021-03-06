<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('service_name');
            $table->integer('price');
            $table->string('appointment_date');
            $table->string('appointment_time');
            

            $table->string('service_id');
            $table->string('user_id');
            $table->string('outlet_id');

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
        Schema::dropIfExists('schedules');
    }
}
