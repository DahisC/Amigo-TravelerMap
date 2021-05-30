<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attractions extends Model
{
    protected $fillable = [
        'id','name','website','tel','description'
    ];
    protected $guarded = [
        'ticket_info','traffic_info','parking_info','user_id','position_id','position_id','opentime_id','opentime_id'
    ];
}