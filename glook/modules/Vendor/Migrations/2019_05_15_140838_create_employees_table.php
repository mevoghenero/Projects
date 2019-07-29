<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('status')->default(0);
            $table->string('vendor_id');
            $table->string('role_id');
            $table->string('outlet_id');
            $table->timestamps();
        });
        Schema::table('employees', function ($table) {
            $table->engine = 'InnoDB';
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['vendor_id']);
        Schema::dropIfExists('employees');
    }
}
