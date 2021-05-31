<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionsTest extends Model
{
    protected $fillable = [
        'id','name','website','tel','description','ticket_info','traffic_info','parking_info'
    ];
    
}
