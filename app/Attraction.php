<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $table = 'attractions';

    protected $fillable = [
        'name', 'website', 'tel', 'description', 'ticket_info', 'traffic_info', 'parking_info','user_id',
    ];
    public function position()
    {
        return $this->hasOne('App\AttractionPosition');
    }
    public function image()
    {
        return $this->hasMany('App\AttractionImage');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
