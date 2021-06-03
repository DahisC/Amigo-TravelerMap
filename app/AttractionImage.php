<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionImage extends Model
{
    public function Attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
}
