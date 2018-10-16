<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\PriceManager;

class TicketCheckoutController extends Controller
{
    private $priceManager;

    public function __construct(PriceManager $priceManager)
    {
        $this->priceManager = $priceManager;
    }

    public function __invoke(Request $request, Ticket $ticket)
    {
        if ($ticket->checkout_at) {
            return redirect()->back()->withErrors('Entrada finalizada. Não é possível alterá-la.');
        }

        $ticket->update([
            'checkout_at' => Carbon::now(),
            'price' => $this->priceManager->calculate($ticket),
        ]);

        return redirect()->back();
    }
}
