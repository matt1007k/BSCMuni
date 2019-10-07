@csrf
<div class="form-group">
    <label for="perspectiva_id">Perspectivas</label>  
    <select name="perspectiva_id" id="perspectiva_id" class="form-control @error('perspectiva_id') is-invalid @enderror">
        <option value="" disabled selected>Seleccionar perspectiva</option>
        @foreach ($perspectivas as $perspectiva)                            
            <option value="{{$perspectiva->id}}"
                {{$objetivo->perspectiva_id === $perspectiva->id ? 'selected' : '' }}
                >{{$perspectiva->titulo}}</option>
        @endforeach
        
    </select>
    @error('perspectiva_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="contenido">Contenido del objetivo</label>
    <textarea type="text" name="contenido" id="contenido" class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $objetivo->contenido) }}</textarea>
    @error('contenido')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-primary btn-block">Guardar</button>