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
    <input type="number"
           class="form-control"
           name="min_time"
           id="min_time"
           value="{{ $price->min_time ?? '' }}"
    />
</div>
<div class="form-group">
    <label for="max_time">Tempo Máximo (minutos)</label>
    <input type="number"
           class="form-control"
           name="max_time"
           id="max_time"
           value="{{ $price->max_time ?? '' }}"
    />
</div>
<div class="form-group">
    <label for="value">Valor R$</label>
    <input type="text"
           class="form-control"
           name="value"
           id="value"
           value="{{ $price->value ?? '' }}"
    />
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
