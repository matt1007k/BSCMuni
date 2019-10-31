@csrf

<div class="form-group mb-2">
    <label for="segmento">CLIENTE(Segmento del mercado)</label>
    <textarea type="text" name="segmento" id="segmento"
        class="form-control form-control-sm  @error('segmento') is-invalid @enderror">{{ old('segmento', $proposicion->segmento) }}</textarea>
    @error('segmento')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="propuesta">Propuesta de valor(¿Cuál de las tres alternativas se debe aplicar y porque?)</label>
    <textarea type="text" name="propuesta" id="propuesta"
        class="form-control form-control-sm  @error('propuesta') is-invalid @enderror"
        rows="10">{{ old('propuesta', $proposicion->propuesta) }}</textarea>
    @error('propuesta')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="elementos">ELEMENTOS DIFERENCIADORES</label>
    <textarea type="text" name="elementos" id="elementos"
        class="form-control form-control-sm  @error('elementos') is-invalid @enderror"
        rows="10">{{ old('elementos', $proposicion->elementos) }}</textarea>
    @error('elementos')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="estrategias">ESTRATEGIAS DE DIFERENCIACION</label>
    <textarea type="text" name="estrategias" id="estrategias"
        class="form-control form-control-sm  @error('estrategias') is-invalid @enderror"
        rows="10">{{ old('estrategias', $proposicion->estrategias) }}</textarea>
    @error('estrategias')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-uppercase">{{ $btnT }}</button>