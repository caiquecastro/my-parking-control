<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('checkout_at')->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::firstOrCreate([
            'plate' => $request->input('plate'),
        ]);

        Ticket::create([
            'vehicle_id' => $vehicle->id,
            'checkin_at' => Carbon::now(),
        ]);

        return redirect('tickets');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->checkout_at) {
            return redirect()->back()->withErrors('Entrada finalizada. Não é possível alterá-la.');
        }

        $ticket->update($request->all());

        return redirect()->back();
    }
}
