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
    public function time()
    {
        return $this->hasOne('App\AttractionTime');
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
            $tagQuery->where('name', '=', $tag);
        });
    }
    public function scopeQueryRegion($query, $region)
    {
        return $query->whereHas('position', function ($positionQuery) use ($region) {
            $positionQuery->where('region', '=', $region);
        });
    }
    public function scopeQueryTown($query, $town)
    {
        return $query->whereHas('position', function ($positionQuery) use ($town) {
            $positionQuery->where('town', '=', $town);
        });
    }
}
