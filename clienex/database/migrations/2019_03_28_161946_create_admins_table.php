<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $collection) {

            $collection->increments('id');
            $collection->string('first_name');
            $collection->string('last_name');
            $collection->unique('email');
            $collection->string('phone_no');
            $collection->boolean('status')->default(0);
            $collection->string('image')->nullable();
            $collection->timestamp('email_verified_at')->nullable();
            $collection->string('password');

            $collection->unsignedInteger('organisation_id');
            $collection->foreign('organisation_id')
                       ->references('id')->on('organisations');
            $collection->rememberToken();
            
            


            $collection->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
