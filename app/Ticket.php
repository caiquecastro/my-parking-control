<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'price',
        'vehicle_id',
        'checkin_at',
        'checkout_at',
    ];

    protected $dates = [
        'checkin_at',
        'checkout_at',
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}
