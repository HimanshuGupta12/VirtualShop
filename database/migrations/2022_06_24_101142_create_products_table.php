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
            $table->bigIncrements('id');
            $table->integer('section_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('seller_id'); //if seller added the product the his id will come ..otherwise if admin added the product then its id will be 0 by default
            $table->string('admin_type');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->integer('original_price');
            $table->integer('offer_price');
            $table->string('product_discount');
            $table->string('product_weight');
            $table->string('product_image');
            $table->string('product_description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->enum('is_featured' , ['No' , 'Yes']);
            $table->tinyInteger('status');
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
};
