<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name')->default('');
            $table->decimal('rating')->default(0);//评分级
            $table->decimal('goods_price');
            $table->integer('month_sales')->default(0);//月销售额
            $table->integer('rating_count')->default(0);//评分级
            $table->string('tips')->default('');//介绍
            $table->integer('satisfy_count')->default(0);//满足指数
            $table->integer('satisfy_rate')->default(0);//满足率
            $table->string('goods_img')->default('');//图片
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('food_category');
            $table->engine='InnoDB';

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
        Schema::dropIfExists('food_menu');
    }
}
