<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    //
    protected $table='food_category';
    protected $fillable=['description','is_selected','name','type_accumulation','shop_id'];
   /* public function shops(){
        return $this->belongsTo(Shop::class);
    }*/


}
