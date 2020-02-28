@csrf

<div class="form-group">
    <label for="contenido">Objetivo</label>
    <textarea type="text" name="contenido" id="contenido"
        class="form-control @error('contenido') is-invalid @enderror">{{ old('contenido', $objetivo->contenido) }}</textarea>
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
                <label class="d-flex align-items-center">
                    <input type="checkbox" name="estrategias[]" class="mr-1" value="{{$estrategia->id}}"
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

<button type="submit" class="btn btn-success">{{$btnT}}</button>