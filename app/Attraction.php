<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
    public function scopeQueryNearbyAttractions($query, $lat, $lng, $distance = 0.5)
    {
        $squarePoints = helpers::getSquarePoint($lat, $lng, $distance);
        $latFrom = $squarePoints[1]['lat'];
        $latTo = $squarePoints[0]['lat'];
        $lngFrom = $squarePoints[0]['lng'];
        $lngTo = $squarePoints[1]['lng'];
        return $query->whereHas('position', function ($positionQuery) use ($latFrom, $latTo, $lngFrom, $lngTo) {
            $positionQuery->whereBetween('lat', [$latFrom, $latTo])->whereBetween('lng', [$lngFrom, $lngTo]);
        });
    }
    public function scopeQueryTags($query, $tag)
    {
        return $query->whereHas('tags', function ($tagQuery) use ($tag) {
            return  $tagQuery->where('name', '=', $tag);
        });
    }
    public function scopeQueryPosition($query, $region, $town)
    {
        return $query->whereHas('position', function ($positionQuery) use ($region, $town) {
            return  $positionQuery->where('region', 'like', $region)->where('town', '=', $town);
        });
    }
}
