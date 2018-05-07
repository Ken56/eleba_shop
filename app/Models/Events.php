<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table='events';
    protected $fillable=['title','contentx','signup_start','signup_end','prize_date','signup_num','is_prize'];
}
