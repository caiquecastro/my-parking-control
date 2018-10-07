@extends('layouts.app')

@section('content')
    <h1>Configurações</h1>

    <form method="post" action="/settings">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="plate">Veículo</label>
            <input type="text"
                   class="form-control"
                   id="plate"
                   name="plate"
                   placeholder="Digite a placa do veículo"
            >
        </div>
        <div class="form-group">
            <label for="checkin_at">Hora da Entrada</label>
            <input type="datetime-local"
                   class="form-control"
                   id="checkin_at"
                   value="{{ now()->format('Y-m-d\TH:i:s') }}"
                   disabled
            >
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
