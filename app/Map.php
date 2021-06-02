<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
