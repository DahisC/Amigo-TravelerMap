<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionImage extends Model
{
    protected $fillable = [
        'url', 'image_desc', 'attraction_id',
    ];
    public function Attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
}
