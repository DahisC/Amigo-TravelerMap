<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttractionPosition extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'country', 'region', 'town', 'address', 'lat', 'lng' ,'attraction_id',
    ];
    public function attraction()
    {
        return $this->belongsTo('App\Attraction')->withDefault();
    }
}
