<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Map extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'color', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    public function attractions()
    {
        return $this->belongsToMany('App\Attraction', 'map_attraction', 'map_id', 'attraction_id')->withTimestamps();
    }
}
