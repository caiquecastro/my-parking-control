<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'type',
        'min_time',
        'max_time',
        'value',
    ];
}
