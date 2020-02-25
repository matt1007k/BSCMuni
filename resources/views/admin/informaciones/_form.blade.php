@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input id="nombre" type="text" name="nombre" class="form-control   @error('nombre') is-invalid @enderror"
        value="{{ old('nombre', $informacion->nombre)}}">
    @error('nombre')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="macroproceso">Macroproceso</label>
    <textarea name="macroproceso" id="macroproceso"
        class="form-control   @error('macroproceso') is-invalid @enderror">{{ old('nombre', $informacion->macroproceso)}}</textarea>
    @error('macroproceso')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="mision">Misión</label>
    <textarea name="mision" id="mision"
        class="form-control   @error('mision') is-invalid @enderror">{{ old('nombre', $informacion->mision)}}</textarea>
    @error('mision')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="vision">Visión</label>
    <textarea name="vision" id="vision"
        class="form-control   @error('vision') is-invalid @enderror">{{ old('nombre', $informacion->vision)}}</textarea>
    @error('vision')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>


<button type="submit" class="btn btn-success">{{$btnT}}</button>