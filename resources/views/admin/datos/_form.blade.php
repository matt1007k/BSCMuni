@csrf
<input type="hidden" value="{{$indicador_id}}" name="indicador_id" />
<div class="row mb-2">
    <div class="mx-auto col-md-6 form-group">
        <div class="row d-flex align-items-center">

            <label class="col-md-2" for="anio">Año:</label>
            <div class="col-md-8">
                <select name="anio" id="anio" class="form-control @error('anio') is-invalid  @enderror">
                    <option value="">Seleccionar año</option>

                    @foreach ($years as $year)
                    <option value="{{ $year['name'] }}"
                        {{ old('anio', $dato->anio) == $year['name'] ? 'selected' : '' }}>
                        {{ $year['name'] }}</option>
                    @endforeach
                </select>
                @error('anio')
                <span class="invalid-feedback">
                    {{ old('anio').' '.$message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<h6 class="font-weight-bold">Ingrese los datos para cada mes</h6>
<div class="row">
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="enero">Enero</label>
            <input name="enero" type="number" minlength="0" id="enero"
                class="col-md-7 form-control  @error('enero') is-invalid  @enderror"
                value="{{ old('enero', $dato->enero) ? old('enero', $dato->enero):0 }}">
            @error('enero')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="febrero">Febrero</label>
            <input name="febrero" type="number" minlength="0" id="febrero"
                class="col-md-7 form-control  @error('febrero') is-invalid  @enderror"
                value="{{ old('febrero', $dato->febrero) ? old('febrero', $dato->febrero) : 0 }}">
            @error('febrero')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="marzo">Marzo</label>
            <input name="marzo" type="number" minlength="0" id="marzo"
                class="col-md-7 form-control  @error('marzo') is-invalid  @enderror"
                value="{{ old('marzo', $dato->marzo) ? old('marzo', $dato->marzo) : 0 }}">
            @error('marzo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="abril">Abril</label>
            <input name="abril" type="number" minlength="0" id="abril"
                class="col-md-7 form-control  @error('abril') is-invalid  @enderror"
                value="{{ old('abril', $dato->abril) ? old('abril', $dato->abril) : 0 }}">
            @error('abril')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="mayo">Mayo</label>
            <input name="mayo" type="number" minlength="0" id="mayo"
                class="col-md-7 form-control  @error('mayo') is-invalid  @enderror"
                value="{{ old('mayo', $dato->mayo) ? old('mayo', $dato->mayo) : 0 }}">
            @error('mayo')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="junio">junio</label>
            <input name="junio" type="number" minlength="0" id="junio"
                class="col-md-7 form-control  @error('junio') is-invalid  @enderror"
                value="{{old('junio', $dato->junio) ? old('junio', $dato->junio) : 0}}">
            @error('junio')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="julio">Julio</label>
            <input name="julio" type="number" minlength="0" id="julio"
                class="col-md-7 form-control  @error('julio') is-invalid  @enderror"
                value="{{old('julio', $dato->julio) ? old('julio', $dato->julio) : 0}}">
            @error('julio')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="agosto">Agosto</label>
            <input name="agosto" type="number" minlength="0" id="agosto"
                class="col-md-7 form-control  @error('agosto') is-invalid  @enderror"
                value="{{old('agosto', $dato->agosto) ? old('agosto', $dato->agosto) : 0}}">
            @error('agosto')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="septiembre">Septiembre</label>
            <input name="septiembre" type="number" minlength="0" id="septiembre"
                class="col-md-7 form-control  @error('septiembre') is-invalid @enderror"
                value="{{old('septiembre', $dato->septiembre) ? old('septiembre', $dato->septiembre) : 0 }}">
            @error('septiembre')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="octubre">Octubre</label>
            <input name="octubre" type="number" minlength="0" id="octubre"
                class="col-md-7 form-control  @error('octubre') is-invalid  @enderror"
                value="{{old('octubre', $dato->octubre) ? old('octubre', $dato->octubre) : 0}}">
            @error('octubre')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="noviembre">Noviembre</label>
            <input name="noviembre" type="number" minlength="0" id="noviembre"
                class="col-md-7 form-control  @error('noviembre') is-invalid  @enderror"
                value="{{old('noviembre', $dato->noviembre) ? old('noviembre', $dato->noviembre) : 0}}">
            @error('noviembre')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md form-group">
        <div class="row align-items-center">
            <label class="col-md" for="diciembre">Diciembre</label>

            <input name="diciembre" type="number" minlength="0" id="diciembre"
                class="col-md-7 form-control  @error('diciembre') is-invalid  @enderror"
                value="{{old('diciembre', $dato->diciembre) ? old('diciembre', $dato->diciembre) : 0}}">
            @error('diciembre')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="mt-2 mb-3 bg-primary p-3 d-flex justify-content-center align-items-center text-uppercase">
    <div class="text-white">
        <strong>Total:</strong>
        <span class="text-secondary">{{ $dato->total ? $dato->total : 0}}</span>
    </div>
    <div class="text-white ml-3">
        <strong>Porcentaje:</strong>
        <span class="text-secondary">{{ $dato->porcentaje ? number_format($dato->porcentaje, 0) : 0.00}}
            %</span>
    </div>
</div>

<button type="submit" class="btn btn-success">{{ $btnT }}</button>