<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->double('price');
            $table->double('sale');
            $table->string('seo_description', 500);
            $table->longText('description');
            $table->string('producer');
            $table->string('material');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('slug');
            $table->integer('active')->default(1);
            $table->string('image');
            $table->timestamps();
        });
        Schema::table('products', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories');
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
};
