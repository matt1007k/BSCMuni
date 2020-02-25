@csrf
<div class="form-group mb-2">
    <label for="titulo">Titulo</label>
    <textarea name="titulo" id="titulo"
        class="form-control @error('titulo') is-invalid @enderror">{{ old('titulo', $area->titulo) }}</textarea>
    @error('titulo')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-success">{{ $btnT }}</button>