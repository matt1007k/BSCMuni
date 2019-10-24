@csrf
<div class="form-group">
    <label for="area_id">Areas</label>  
    <select name="area_id" id="area_id" class="form-control form-control-sm  @error('area_id') is-invalid @enderror">
        <option value="" disabled selected>Seleccionar area</option>
        @foreach ($areas as $area)                            
            <option value="{{$area->id}}"
                {{$actividad->area_id === $area->id ? 'selected' : '' }}
                >{{$area->titulo}}</option>
        @endforeach
        
    </select>
    @error('area_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="titulo">Titulo del actividad</label>
    <textarea type="text" name="titulo" id="titulo" class="form-control form-control-sm  @error('titulo') is-invalid @enderror">{{ old('titulo', $actividad->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary text-uppercase">{{ $btnT }}</button>