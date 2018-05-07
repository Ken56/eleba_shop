<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_Members extends Model
{
    protected $table='event_members';
    protected $fillable=['events_id','member_id',];
}
