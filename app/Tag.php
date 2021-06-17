<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'color',
    ];
    public  function attractions()
    {
        return $this->belongsToMany('App\Attraction')->withTimestamps();
    }
}
