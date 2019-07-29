<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->strings('name');
            $table->integer('qty');
            $table->integer('unit_sp');
            $table->integer('unit_cp');
            $table->integer('total_cp');
            $table->string('manufacturer');
            $table->integer('ref_no');
            $table->datetime('expire_date');
            $table->datetime('manu_date');

            $table->unsignedInteger('product_type_id');
            $table->unsignedInteger('outlet_id');
            
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('product_type_id')->references('id')->on('product_types');
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
        Schema::dropIfExists('products');
    }
}
