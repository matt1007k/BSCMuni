@csrf
<div class="form-group">
    <label for="proceso_id">Procesos</label>  
    <select name="proceso_id" id="proceso_id" class="form-control form-control-sm  @error('proceso_id') is-invalid @enderror">
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

<div class="form-group mb-2">
    <label for="titulo">Ingrese subproceso</label>
    <textarea type="text" name="titulo" id="titulo" class="form-control form-control-sm  @error('titulo') is-invalid @enderror">{{ old('titulo', $subproceso->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary text-uppercase">{{$btnT}}</button>