<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('amount');
            $table->string('reference');
            $table->string('authorization_url')->nullable();
            $table->string('access_code')->nullable();            
            $table->string('transaction_time');
            $table->string('email');

            
            $table->string('user_id');
            $table->string('schedule_id');
            $table->string('vendor_id');

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
        Schema::dropIfExists('payments');
    }
}
