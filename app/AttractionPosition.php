<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionPosition extends Model
{
    protected $fillable = [
        'country', 'region', 'town','address','px', 'py'
    ];
}
