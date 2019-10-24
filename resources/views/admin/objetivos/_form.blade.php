@csrf
<div class="form-group">
    <label for="perspectiva_id">Perspectivas</label>  
    <select name="perspectiva_id" id="perspectiva_id" class="form-control form-control-sm  @error('perspectiva_id') is-invalid @enderror">
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
    <textarea type="text" name="contenido" id="contenido" class="form-control form-control-sm  @error('contenido') is-invalid @enderror">{{ old('contenido', $objetivo->contenido) }}</textarea>
    @error('contenido')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="h6">Asignar estrategias (Opcional)</div>
        @error('estrategias')
            <span class="w-100 z4 mb-4 alert alert-danger">{{ $message }}</span>
        @enderror
        <ul class="list-group">
            @foreach ($estrategias as $estrategia)
                <li class="list-group-item">
                    <label>
                        <input type="checkbox" name="estrategias[]" value="{{$estrategia->id}}"
                            @foreach($objetivo->estrategias as $estrategia_objectivo)
                        {{$estrategia_objectivo->id == $estrategia->id ? 'checked' : ''}}
                        @endforeach />
                        <span>{{$estrategia->contenido}}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>

</div>

<button type="submit" class="btn btn-primary text-uppercase">{{$btnT}}</button>