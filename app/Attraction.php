<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attraction extends Model
{
    use SoftDeletes;
    protected $table = 'attractions';

    protected $fillable = [
        'name', 'website', 'tel', 'description', 'ticket_info', 'traffic_info', 'parking_info', 'user_id',
    ];
    public function position()
    {
        return $this->hasOne('App\AttractionPosition');
    }
    public function images()
    {
        return $this->hasMany('App\AttractionImage');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function maps()
    {
        return $this->belongsToMany('App\Map', 'map_attraction', 'attraction_id', 'map_id')->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_attraction', 'attraction_id', 'user_id')->withTimestamps();
    }
}
