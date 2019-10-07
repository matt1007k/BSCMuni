@csrf
<div class="form-group">
    <label for="titulo">Titulo del area</label>
    <textarea name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $area->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary btn-block">Guardar</button>