@csrf
<div class="form-group">
    <label for="proceso_id">Procesos</label>  
    <select name="proceso_id" id="proceso_id" class="form-control @error('proceso_id') is-invalid @enderror">
        <option value="" disabled selected>Seleccionar proceso</option>
        @foreach ($procesos as $proceso)                            
            <option value="{{$proceso->id}}"
                {{$subproceso->proceso_id === $proceso->id ? 'selected' : '' }}
                >{{$proceso->titulo}}</option>
        @endforeach
        
    </select>
    @error('proceso_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="titulo">Titulo del subproceso</label>
    <textarea type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $subproceso->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary btn-block">Guardar</button>