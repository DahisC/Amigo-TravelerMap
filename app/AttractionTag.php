<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionTag extends Model
{
    protected $fillable = [
        'attraction_id', 'tag_id'
    ];
}
