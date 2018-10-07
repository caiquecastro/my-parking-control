@extends('layouts.app')

@section('content')
    <h1>Nova Regra de Preço</h1>

    <a href="/prices" class="btn btn-primary mb-2">Tabela de Preços</a>

    <form method="post" action="/prices">
        @csrf
        <div class="form-group">
            <label for="type">Modalidade</label>
            <select class="form-control" name="type" id="type">
                <option value="single">Avulso</option>
                <option value="monthly">Convênio</option>
                <option value="monthly">Mensalista</option>
                <option value="loyalty">Fidelidade</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_time">Tempo Mínimo (minutos)</label>
            <input type="number" class="form-control" name="min_time" id="min_time" />
        </div>
        <div class="form-group">
            <label for="max_time">Tempo Máximo (minutos)</label>
            <input type="number" class="form-control" name="max_time" id="max_time" />
        </div>
        <div class="form-group">
            <label for="value">Valor R$</label>
            <input type="text" class="form-control" name="value" id="value" />
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
