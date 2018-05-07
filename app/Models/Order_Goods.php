<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Goods extends Model
{
    //
    protected $table='order_goods';
    protected $fillable = [
        'order_id','goods_id','goods_name','goods_price','goods_img','amount',
    ];
}
