<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionTime extends Model
{
    protected $fillable = [
        'startDate', 'start_year', 'start_month', 'start_day', 'endDate', 'end_year', 'end_month', 'end_day', 'attraction_id'
    ];
    public function attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
}
