@extends('layouts.app')

@section('content')
    <h1>Veículos</h1>

    <a href="/vehicles/create" class="btn btn-primary mb-2">Novo Veículo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->plate }}</td>
                <td>{{ $vehicle->brand }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>
                    <a href="/vehicles/{{ $vehicle->id }}">Ver</a>
                    <a href="/vehicles/{{ $vehicle->id }}/edit">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
