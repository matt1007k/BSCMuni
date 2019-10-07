@csrf
<input type="hidden" value="{{$objetivo_id}}" name="objetivo_id" />
<div class="row">     
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="indicador">Indicador del objetivo</label>
            <textarea name="indicador" id="indicador" class="form-control @error('indicador') is-invalid @enderror">{{ old('indicador', $indicador->indicador) }}</textarea>
            @error('indicador')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Tipo de indicador</label>
            <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
                <option value="porcentaje" @if($indicador->tipo == 'porcentaje') @endif>Un porcentaje normal</option>
                <option value="incremento" @if($indicador->tipo == 'incremento') @endif>Un porcentaje de incremento</option>
                <option value="reducir" @if($indicador->tipo == 'reducir') @endif>Un porcentaje de reducción</option>
                <option value="numero" @if($indicador->tipo == 'numero') @endif>Cantidad en números positivos</option>
            </select>
            @error('tipo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="unidad">Tipo de unidad (Porcentaje o Num. cantidad)</label>
            <input name="unidad" type="text" id="unidad" class="form-control @error('unidad') is-invalid @enderror" value="{{ old('unidad', $indicador->unidad) }}">
            @error('unidad')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tiempo">Tiempo a futuro (Dia(s), Mes(es) o Año(s))</label>
            <input name="tiempo" type="text" id="tiempo" class="form-control @error('tiempo') is-invalid @enderror" value="{{ old('tiempo', $indicador->tiempo) }}">
            @error('tiempo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="meta">Meta a cumplir (número positivo)</label>
            <input name="meta" type="text" id="meta" class="form-control @error('meta') is-invalid @enderror" value="{{ old('meta', $indicador->meta) }}">
            @error('meta')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <h5 class="text-center text-white bg-info p-2">Semáforo</h5>
        <p>Nos ayudará a medir, si se cumplió o no el objetivo.</p>
        <div class="form-group">
            <label for="verde" class="text-success">Verde</label> 
            <input name="verde" type="text" id="verde" class="form-control @error('verde') is-invalid @enderror" value="{{ old('verde', $indicador->verde) }}">
            @error('verde')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="amarillo" class="text-warning">Amarillo</label> 
            <input name="amarillo" type="text" id="amarillo" class="form-control @error('amarillo') is-invalid @enderror" value="{{ old('amarillo', $indicador->amarillo) }}">
            @error('amarillo')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="rojo" class="text-danger">Rojo</label>
            <input name="rojo" type="text" id="rojo" class="form-control @error('rojo') is-invalid @enderror" value="{{ old('rojo', $indicador->rojo) }}">
            @error('rojo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
            
    </div>
</div>   


<button type="submit" class="btn btn-primary btn-block">Guardar</button>