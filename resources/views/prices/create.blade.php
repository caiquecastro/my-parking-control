@extends('layouts.app')

@section('content')
    <h1>Nova Regra de Preço</h1>

    <a href="/prices" class="btn btn-primary mb-2">Tabela de Preços</a>

    <form method="post" action="/prices">
        @include('prices.form')
    </form>
@endsection
