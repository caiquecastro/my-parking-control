@extends('layouts.app')
@inject('priceManager', 'App\Services\PriceManager')

@section('content')
    <h1>Entrada</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    @endif

    <dl class="row">
        <dt class="col-2">Veículo</dt>
        <dd class="col-10">
            <a href="{{ route('vehicles.show', $ticket->vehicle) }}">{{ $ticket->vehicle->plate }}</a>
        </dd>

        <dt class="col-2">Hora da Entrada</dt>
        <dd class="col-10">
            {{ $ticket->checkin_at }}
        </dd>

        <dt class="col-2">Hora da Saída</dt>
        <dd class="col-10">
            {{ $ticket->checkout_at ?? 'Estacionado' }}
        </dd>

        <dt class="col-2">Preço</dt>
        <dd class="col-10">R$ {{ number_format($priceManager->calculate($ticket), 2, ',', '.') }}</dd>
    </dl>

    {!! QrCode::size(250)->generate(Request::url()) !!}

    <form action="/tickets/{{ $ticket->id }}/checkout" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-primary">Registrar Saída</button>
    </form>
@endsection
