@csrf

<div class="form-group mb-2">
    <label for="segmento">CLIENTE(Segmento del mercado)</label>
    <textarea type="text" name="segmento" id="segmento"
        class="form-control @error('segmento') is-invalid @enderror">{{ old('segmento', $proposicion->segmento) }}</textarea>
    @error('segmento')
    <span class="text-danger" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-2">
    <label for="propuesta">Propuesta de valor(¿Cuál de las tres alternativas se debe aplicar y porque?)</label>
    <textarea type="text" name="propuesta" id="propuesta" class="form-control @error('propuesta') is-invalid @enderror"
        rows="10">{{ old('propuesta', $proposicion->propuesta) }}</textarea>
    @error('propuesta')
    <span class="text-danger" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="elementos">ELEMENTOS DIFERENCIADORES</label>
    <textarea type="text" name="elementos" id="elementos" class="form-control @error('elementos') is-invalid @enderror"
        rows="10">{{ old('elementos', $proposicion->elementos) }}</textarea>
    @error('elementos')
    <span class="text-danger" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-2">
    <label for="estrategias">ESTRATEGIAS DE DIFERENCIACION</label>
    <textarea type="text" name="estrategias" id="estrategias"
        class="form-control @error('estrategias') is-invalid @enderror"
        rows="10">{{ old('estrategias', $proposicion->estrategias) }}</textarea>
    @error('estrategias')
    <span class="text-danger" role="alert">{{ $message }}</span>
    @enderror
</div>
<button type="submit" class="btn btn-success">{{ $btnT }}</button>

@push('scripts')
<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('segmento');
    CKEDITOR.replace('propuesta');
    CKEDITOR.replace('elementos');
    CKEDITOR.replace('estrategias');
  CKEDITOR.editorConfig = function( config ) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;
  };
  
</script>
@endpush