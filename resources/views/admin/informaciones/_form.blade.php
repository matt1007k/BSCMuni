@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input id="nombre" type="text" name="nombre" class="form-control form-control-sm  @error('nombre') is-invalid @enderror" value="{{ old('nombre', $informacion->nombre)}}">
    @error('nombre')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="mision">Misión de la org.</label>
    <textarea name="mision" id="mision" class="form-control form-control-sm  @error('mision') is-invalid @enderror">{{ old('nombre', $informacion->mision)}}</textarea>
    @error('mision')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="vision">Visión de la org.</label>
    <textarea name="vision" id="vision" class="form-control  form-control-sm @error('vision') is-invalid @enderror">{{ old('nombre', $informacion->vision)}}</textarea>
    @error('vision')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="macroproceso">Macroproceso de la org.</label>
    <textarea name="macroproceso" id="macroproceso" class="form-control form-control-sm  @error('macroproceso') is-invalid @enderror">{{ old('nombre', $informacion->macroproceso)}}</textarea>
    @error('macroproceso')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-uppercase">{{$btnT}}</button>