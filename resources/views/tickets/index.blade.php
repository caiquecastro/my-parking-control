@extends('layouts.app')
@inject('priceManager', 'App\Services\PriceManager')

@section('content')
    <h1>Entradas</h1>

    <a href="/tickets/create" class="btn btn-primary mb-2">Nova Entrada</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Veículo</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Tempo Permanência</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->vehicle->plate }}</td>
                <td>{{ $ticket->checkin_at->format('d/m/Y H:i') }}</td>
                <td>{{ optional($ticket->checkout_at)->format('d/m/Y H:i') ?? '-' }}</td>
                <td>
                    {{ $ticket->checkin_at->diffInMinutes($ticket->checkout_at) }}
                    minutos
                    {{ is_null($ticket->checkout_at) ? '(até o momento)' : '' }}
                </td>
                <td>R$ {{ number_format($priceManager->calculate($ticket), 2, ',', '.') }}</td>
                <td>
                    <form action="/tickets/{{ $ticket->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="checkout_at" value="{{ now() }}">
                        <button type="submit" class="btn btn-sm btn-info">Saída</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
