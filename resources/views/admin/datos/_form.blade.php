@csrf
<input type="hidden" value="{{$indicador_id}}" name="indicador_id" />
<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="anio">El año</label>
            <select name="anio" id="anio" class="form-control @error('anio') is-invalid  @enderror">
                <option value="">Seleccionar el año</option>
                <option value="2023" {{ old('anio', $dato->anio) == 2023 ? 'selected' : '' }}>2023</option>
                <option value="2022" {{ old('anio', $dato->anio) == 2022 ? 'selected' : '' }}>2022</option>
                <option value="2021" {{ old('anio', $dato->anio) == 2021 ? 'selected' : '' }}>2021</option>
                <option value="2020" {{ old('anio', $dato->anio) == 2020 ? 'selected' : '' }}>2020</option>
                <option value="2019" {{ old('anio', $dato->anio) == 2019 ? 'selected' : '' }}>2019</option>
                <option value="2018" {{ old('anio', $dato->anio) == 2018 ? 'selected' : '' }}>2018</option>
                <option value="2017" {{ old('anio', $dato->anio) == 2017 ? 'selected' : '' }}>2017</option>
            </select>
            @error('anio')
            <span class="invalid-feedback">
                {{ old('anio').' '.$message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div> <strong>Total:</strong>  {{ $dato->total ? $dato->total : 0}}</div>
                <div><strong>Porcentaje:</strong>  {{ $dato->porcentaje ? number_format($dato->porcentaje, 0) : 0.00}} %</div>
            </div>
        </div>
    </div>
</div>

<h5 class="p-3 bg-info text-white">Datos por cada mes del año</h5>
<div class="row">
    <div class="col-md-6">  
        <div class="form-group">
            <label for="enero">Enero</label> 
            <input name="enero" type="number"  minlength="0" id="enero" class="form-control @error('enero') is-invalid  @enderror" value="{{ old('enero', $dato->enero) ? old('enero', $dato->enero):0 }}">
            @error('enero')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="febrero">Febrero</label> 
            <input name="febrero" type="number" minlength="0" id="febrero" class="form-control @error('febrero') is-invalid  @enderror" value="{{ old('febrero', $dato->febrero) ? old('febrero', $dato->febrero) : 0 }}">
            @error('febrero')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="marzo">Marzo</label> 
            <input name="marzo" type="number" minlength="0" id="marzo" class="form-control @error('marzo') is-invalid  @enderror" value="{{ old('marzo', $dato->marzo) ? old('marzo', $dato->marzo) : 0 }}">
            @error('marzo')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="abril">Abril</label> 
            <input name="abril" type="number" minlength="0" id="abril" class="form-control @error('abril') is-invalid  @enderror" value="{{ old('abril', $dato->abril) ? old('abril', $dato->abril) : 0 }}">
            @error('abril')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mayo">Mayo</label> 
            <input name="mayo" type="number" minlength="0" id="mayo" class="form-control @error('mayo') is-invalid  @enderror" value="{{ old('mayo', $dato->mayo) ? old('mayo', $dato->mayo) : 0 }}">
            @error('mayo')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="junio">junio</label> 
            <input name="junio" type="number" minlength="0" id="junio" class="form-control @error('junio') is-invalid  @enderror" value="{{old('junio', $dato->junio) ? old('junio', $dato->junio) : 0}}">
            @error('junio')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
                
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="julio">Julio</label> 
            <input name="julio" type="number" minlength="0" id="julio" class="form-control @error('julio') is-invalid  @enderror" value="{{old('julio', $dato->julio) ? old('julio', $dato->julio) : 0}}">
            @error('julio')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="agosto">Agosto</label> 
            <input name="agosto" type="number" minlength="0" id="agosto" class="form-control @error('agosto') is-invalid  @enderror" value="{{old('agosto', $dato->agosto) ? old('agosto', $dato->agosto) : 0}}">
            @error('agosto')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="septiembre">Septiembre</label> 
            <input name="septiembre" type="number" minlength="0" id="septiembre" class="form-control @error('septiembre') is-invalid @enderror"   value="{{old('septiembre', $dato->septiembre) ? old('septiembre', $dato->septiembre) : 0 }}">
            @error('septiembre')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="octubre">Octubre</label> 
            <input name="octubre" type="number" minlength="0" id="octubre" class="form-control @error('octubre') is-invalid  @enderror" value="{{old('octubre', $dato->octubre) ? old('octubre', $dato->octubre) : 0}}">
            @error('octubre')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="noviembre">Noviembre</label> 
            <input name="noviembre" type="number" minlength="0" id="noviembre" class="form-control @error('noviembre') is-invalid  @enderror" value="{{old('noviembre', $dato->noviembre) ? old('noviembre', $dato->noviembre) : 0}}">
            @error('noviembre')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="diciembre">Diciembre</label> 
            <input name="diciembre" type="number" minlength="0" id="diciembre" class="form-control @error('diciembre') is-invalid  @enderror" value="{{old('diciembre', $dato->diciembre) ? old('diciembre', $dato->diciembre) : 0}}">
            @error('diciembre')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary btn-block">Guardar</button>