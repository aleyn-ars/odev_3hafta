<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->string('name');
            $table->string('photo');
            $table->string('price',5,2);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->string('is_approve');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('deleted_by')->references('id')->on('users')->cascadeOnDelete();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('products');
    }
}
