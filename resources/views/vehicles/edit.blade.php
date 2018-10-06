@extends('layouts.app')

@section('content')
    <h1>Editar Veículo</h1>

    <form action="/vehicles/{{ $vehicle->id }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text"
                   class="form-control"
                   id="plate"
                   name="plate"
                   placeholder="Digite a placa do veículo"
                   value="{{ $vehicle->plate }}"
            >
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text"
                   class="form-control"
                   id="brand"
                   name="brand"
                   placeholder="ex: Volkswagen, Ford, Chevrolet"
                   value="{{ $vehicle->brand }}"
            >
        </div>

        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text"
                   class="form-control"
                   id="model"
                   name="model"
                   placeholder="ex: Gol, Palio, HB20"
                   value="{{ $vehicle->brand }}"
            >
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
