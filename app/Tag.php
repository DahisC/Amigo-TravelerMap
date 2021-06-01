<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public  function attractions()
    {
        return $this->belongsToMany('App\Attractions')->withTimestamps();
    }
}
