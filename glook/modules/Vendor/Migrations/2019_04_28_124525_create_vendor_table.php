<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id')->primary();
            $table->string('vendor_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('website_link')->nullable();
            $table->string('payout_method')->nullable();
            $table->string('commission_percent')->nullable();
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
        Schema::dropIfExists('vendor');
    }
}
