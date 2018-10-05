<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Vehicle;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

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
        $ticket->update($request->all());

        return redirect()->back();
    }
}
