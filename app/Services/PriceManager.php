<?php

namespace App\Services;

use App\Price;

class PriceManager
{
    public function calculate($ticket)
    {
        $minutes = $ticket->checkin_at->diffInMinutes($ticket->checkout_at);

        $price = Price::where('min_time', '<=', $minutes)
            ->where('max_time', '>=', $minutes)
            ->first();

        return $price->value ?? null;
    }
}
