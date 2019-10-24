@csrf
<div class="form-group">
    <label for="titulo">Titulo del proceso</label>
    <textarea name="titulo" id="titulo" class="form-control form-control-sm  @error('titulo') is-invalid @enderror">{{ old('titulo', $proceso->titulo) }}</textarea>
    @error('titulo')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-uppercase">{{$btnT}}</button>