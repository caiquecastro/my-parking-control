@extends('layouts.app')

@section('content')
    <h1>Tabela de Preços</h1>

    <a href="/prices/create" class="btn btn-primary mb-2">Nova Regra de Preço</a>

    <table class="table">
        <thead>
            <tr>
                <th>Modalidade</th>
                <th>Tempo Mínimo</th>
                <th>Tempo Máximo</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
            <tr>
                <td>{{ $price->type }}</td>
                <td>{{ $price->min_time }}</td>
                <td>{{ $price->max_time }}</td>
                <td>{{ $price->value }}</td>
                <td>
                    <a href="/prices/{{ $price->id }}">Ver</a>
                    <a href="/prices/{{ $price->id }}/edit">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
