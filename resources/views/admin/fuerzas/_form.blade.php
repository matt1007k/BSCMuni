@csrf
<div class="form-group">
    <label for="titulo">Titulo de la fuerza</label>
    <textarea name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $fuerza->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary btn-block">Guardar</button>