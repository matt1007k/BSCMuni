@csrf
<div class="form-group mb-3">
    <label for="titulo">Titulo de la fuerza</label>
    <textarea name="titulo" id="titulo" class="form-control form-control-sm  @error('titulo') is-invalid @enderror">{{ old('titulo', $fuerza->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-uppercase">{{ $btnT }}</button>