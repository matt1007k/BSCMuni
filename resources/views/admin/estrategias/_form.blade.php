@csrf
<input type="hidden" value="{{$tipo}}" name="tipo" />
<div class="form-group">
    <label for="foda">Relación de {{$tipo}}</label>
    <textarea name="foda" id="foda"
        class="form-control @error('foda') is-invalid @enderror">{{ old('foda', $estrategia->foda) }}</textarea>
    @error('foda')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="contenido">Estrategia</label>
    <textarea name="contenido" id="contenido"
        class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $estrategia->contenido) }}</textarea>
    @error('contenido')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<button type="submit" class="btn btn-success">{{$btnT}}</button>