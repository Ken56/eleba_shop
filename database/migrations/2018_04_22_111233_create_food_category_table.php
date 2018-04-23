<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->tinyInteger('is_selected');//默认分类
            $table->string('name');//分类名称
            $table->string('type_accumulation');//c1 c2
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->engine='InnoDB';//设置引擎
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
        Schema::dropIfExists('food_category');
    }
}
