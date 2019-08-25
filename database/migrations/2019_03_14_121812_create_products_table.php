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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('code')->unique();
            $table->longText('content')->nullable();
            $table->longText('attributes')->nullable();
            $table->integer('original_price')->default(0)->unsigned();
            $table->integer('sale_price')->default(0)->unsigned();
            $table->integer('quantity')->default(0)->unsigned();
            $table->tinyInteger('featured')->default(0);


            $table->unsignedBigInteger('cate_id')->index();
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
