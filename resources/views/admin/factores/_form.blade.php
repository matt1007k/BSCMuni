@csrf
<div class="form-group">
    <label for="fuerza_id">5 fuerzas de Porter</label>  
    <select name="fuerza_id" id="fuerza_id" class="form-control @error('fuerza_id') is-invalid @enderror">
        <option value="" disabled selected>Seleccionar fuerza</option>
        @foreach ($fuerzas as $fuerza)                            
            <option value="{{$fuerza->id}}"
                {{$factor->fuerza_id === $fuerza->id ? 'selected' : '' }}
                >{{$fuerza->titulo}}</option>
        @endforeach
        
    </select>
    @error('fuerza_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="titulo">Titulo del factor</label>
    <textarea type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $factor->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary btn-block">Guardar</button>