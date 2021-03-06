<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('status')->default(0);


            $table->unsignedInteger('organisation_id');
            $table->unsignedInteger('outlet_id')->nullable();
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('role_id');

            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');

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
        Schema::dropIfExists('organisation_users');
    }
}
