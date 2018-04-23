<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    protected $table='food_menu';
    protected $fillable=['goods_name','rating','goods_price','month_sales','rating_count','tips','satisfy_count','satisfy_rate','goods_img','shop_id','category_id'];
}
