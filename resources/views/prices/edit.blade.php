@extends('layouts.app')

@section('content')
    <h1>Editar Regra de Preço</h1>

    <a href="/prices" class="btn btn-primary mb-2">Tabela de Preços</a>

    <form method="post" action="/prices/{{ $price->id }}">
        @method('PATCH')
        @include('prices.form')
    </form>
@endsection
