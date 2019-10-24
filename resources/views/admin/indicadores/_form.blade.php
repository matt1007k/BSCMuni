@csrf
<input type="hidden" value="{{$objetivo_id}}" name="objetivo_id" />
<div class="w-100 mb-2">     
    <div class="form-group">
        <label for="indicador">El indicador</label>
        <textarea name="indicador" id="indicador" class="form-control form-control-sm  @error('indicador') is-invalid @enderror">{{ old('indicador', $indicador->indicador) }}</textarea>
        @error('indicador')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>El tipo de indicador</label>
        <select class="form-control form-control-sm  @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
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
        <label for="unidad">El tipo de unidad (% o Num. cantidad)</label>
        <input name="unidad" type="text" id="unidad" class="form-control form-control-sm  @error('unidad') is-invalid @enderror" value="{{ old('unidad', $indicador->unidad) }}">
        @error('unidad')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="tiempo">El tiempo</label>
        <input name="tiempo" type="text" id="tiempo" class="form-control form-control-sm  @error('tiempo') is-invalid @enderror" value="{{ old('tiempo', $indicador->tiempo) }}">
        @error('tiempo')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="meta">Nuestra meta</label>
        <input name="meta" type="text" id="meta" class="form-control form-control-sm  @error('meta') is-invalid @enderror" value="{{ old('meta', $indicador->meta) }}">
        @error('meta')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <h5>Semáforo</h5>
    <div class="form-group">
        <label for="verde">Verde</label> 
        <input name="verde" type="text" id="verde" class="form-control form-control-sm  @error('verde') is-invalid @enderror" value="{{ old('verde', $indicador->verde) }}">
        @error('verde')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="amarillo">Amarillo</label> 
        <input name="amarillo" type="text" id="amarillo" class="form-control form-control-sm  @error('amarillo') is-invalid @enderror" value="{{ old('amarillo', $indicador->amarillo) }}">
        @error('amarillo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="rojo">Rojo</label>
        <input name="rojo" type="text" id="rojo" class="form-control form-control-sm  @error('rojo') is-invalid @enderror" value="{{ old('rojo', $indicador->rojo) }}">
        @error('rojo')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>   


<button type="submit" class="btn btn-primary text-uppercase">{{$btnT}}</button>