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
        return $this->belongsTo('App\User');
    }
}
