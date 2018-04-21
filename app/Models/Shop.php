<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
/*$table->increments('id');
$table->string('shop_name');
$table->string('shop_img');
$table->string('shop_rating');
$table->tinyInteger('brand');
$table->tinyInteger('on_time');
$table->tinyInteger('fengniao');
$table->tinyInteger('bao');
$table->tinyInteger('piao');
$table->tinyInteger('zhun');
$table->decimal('start_send');
$table->decimal('send_cost');
$table->integer('estimate_time');
$table->string('notice');
$table->string('discount');
$table->string('category_id');
$table->timestamps();*/
    protected $table='shops';
    protected $fillable=['shop_name','shop_img','shop_rating','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','estimate_time','notice','discount','category_id',];
}
