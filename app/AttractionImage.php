<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttractionImage extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'url', 'image_desc', 'attraction_id',
    ];
    public function attraction()
    {
        return $this->belongsTo('App\Attraction')->withDefault();
    }
}
