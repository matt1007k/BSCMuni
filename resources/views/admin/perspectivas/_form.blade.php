@csrf
<div class="form-group mb-3">
    <label for="titulo">Titulo de la perspectiva</label>
    <textarea name="titulo" id="titulo"
        class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $perspectiva->titulo) }}</textarea>
    @error('titulo')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-success">{{ $btnT }}</button>