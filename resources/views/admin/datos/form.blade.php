<input type="hidden" value="{{$indicador_id}}" name="indicador_id" />
<div class="row">
    <div class="input-field col m12">
        <select name="anio" id="anio">
            <option value="">Seleccionar el año</option>
            <option value="2023" @isset($dato) {{ $dato->anio == 2023 ? 'selected' : '' }} @else {{ old('anio') == 2023 ? 'selected' : '' }} @endisset>2023</option>
            <option value="2022" @isset($dato) {{ $dato->anio == 2022 ? 'selected' : '' }} @else {{ old('anio') == 2022 ? 'selected' : '' }} @endisset>2022</option>
            <option value="2021" @isset($dato) {{ $dato->anio == 2021 ? 'selected' : '' }} @else {{ old('anio') == 2021 ? 'selected' : '' }} @endisset>2021</option>
            <option value="2020" @isset($dato) {{ $dato->anio == 2020 ? 'selected' : '' }} @else {{ old('anio') == 2020 ? 'selected' : '' }} @endisset>2020</option>
            <option value="2019" @isset($dato) {{ $dato->anio == 2019 ? 'selected' : '' }} @else {{ old('anio') == 2019 ? 'selected' : '' }} @endisset>2019</option>
            <option value="2018" @isset($dato) {{ $dato->anio == 2018 ? 'selected' : '' }} @else {{ old('anio') == 2018 ? 'selected' : '' }} @endisset>2018</option>
            <option value="2017" @isset($dato) {{ $dato->anio == 2017 ? 'selected' : '' }} @else {{ old('anio') == 2017 ? 'selected' : '' }} @endisset>2017</option>
        </select>
        <label for="anio">El año</label>
        @if ($errors->has('anio'))
        <span class="helper-text red-text darken-1">
            {{ old('anio').' '.$errors->first('anio') }}
        </span>
        @endif
    </div>
    <div class="col m12">
        <h5>Meses</h5>
    </div>
    <div class="input-field col s12 m6">
        <input name="enero" type="number"  minlength="0" id="enero" class="validate" @isset($dato) value="{{$dato->enero}}" @else value="{{old('enero') ? old('enero'): 0}}" @endisset >
        <label for="enero">Enero</label> 
        @if ($errors->has('enero'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('enero') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="febrero" type="number" minlength="0" id="febrero" class="validate" @isset($dato) value="{{$dato->febrero}}" @else value="{{old('febrero') ? old('febrero'): 0}}" @endisset>
        <label for="febrero">Febrero</label> 
        @if ($errors->has('febrero'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('febrero') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="marzo" type="number" minlength="0" id="marzo" class="validate" @isset($dato) value="{{$dato->marzo}}" @else value="{{old('marzo') ? old('marzo'): 0}}" @endisset>
        <label for="marzo">Marzo</label> 
        @if ($errors->has('marzo'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('marzo') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="abril" type="number" minlength="0" id="abril" class="validate" @isset($dato) value="{{$dato->abril}}" @else value="{{old('abril') ? old('abril'): 0}}" @endisset>
        <label for="abril">Abril</label> 
        @if ($errors->has('abril'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('abril') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="mayo" type="number" minlength="0" id="mayo" class="validate" @isset($dato) value="{{$dato->mayo}}" @else value="{{old('mayo') ? old('mayo'): 0}}" @endisset>
        <label for="mayo">Mayo</label> 
        @if ($errors->has('mayo'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('mayo') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="junio" type="number" minlength="0" id="junio" class="validate" @isset($dato) value="{{$dato->junio}}" @else value="{{old('junio') ? old('junio'): 0}}" @endisset>
        <label for="junio">junio</label> 
        @if ($errors->has('junio'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('junio') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="julio" type="number" minlength="0" id="julio" class="validate" @isset($dato) value="{{$dato->julio}}" @else value="{{old('julio') ? old('julio'): 0}}" @endisset>
        <label for="julio">Julio</label> 
        @if ($errors->has('julio'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('julio') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="agosto" type="number" minlength="0" id="agosto" class="validate" @isset($dato) value="{{$dato->agosto}}" @else value="{{old('agosto') ? old('agosto'): 0}}" @endisset>
        <label for="agosto">Agosto</label> 
        @if ($errors->has('agosto'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('agosto') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="septiembre" type="number" minlength="0" id="septiembre" class="validate" @isset($dato) value="{{$dato->septiembre}}" @else value="{{old('septiembre') ? old('septiembre'): 0}}" @endisset>
        <label for="septiembre">Septiembre</label> 
        @if ($errors->has('septiembre'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('septiembre') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="octubre" type="number" minlength="0" id="octubre" class="validate" @isset($dato) value="{{$dato->octubre}}" @else value="{{old('octubre') ? old('octubre'): 0}}" @endisset>
        <label for="octubre">Octubre</label> 
        @if ($errors->has('octubre'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('octubre') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="noviembre" type="number" minlength="0" id="noviembre" class="validate" @isset($dato) value="{{$dato->noviembre}}" @else value="{{old('noviembre') ? old('noviembre'): 0}}" @endisset>
        <label for="noviembre">Noviembre</label> 
        @if ($errors->has('noviembre'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('noviembre') }}
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="diciembre" type="number" minlength="0" id="diciembre" class="validate" @isset($dato) value="{{$dato->diciembre}}" @else value="{{old('diciembre') ? old('diciembre'): 0}}" @endisset>
        <label for="diciembre">Diciembre</label> 
        @if ($errors->has('diciembre'))
            <span class="helper-text red-text darken-1">
                {{ $errors->first('diciembre') }}
            </span>
        @endif
    </div>
    <div class="col m12">
        <h5>Total y Porcentaje</h5>
    </div>
    <div class="input-field col s12 m6">
        <input name="total" type="number" disabled minlength="0" id="total" class="validate" @isset($dato) value="{{$dato->total}}" @else value="0" @endisset>
        <label for="total">Total del año</label>
        @if ($errors->has('total'))
        <span class="helper-text red-text darken-1">
            {{ $errors->first('total') }}
        </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input name="porcentaje" type="number" minlength="0" disabled id="porcentaje" class="validate" @isset($dato) value="{{$dato->porcentaje}}" @else value="0" @endisset>
        <label for="porcentaje">porcentaje del año</label>
        @if ($errors->has('porcentaje'))
        <span class="helper-text red-text darken-1">
            {{ $errors->first('porcentaje') }}
        </span>
        @endif
    </div>
</div>

<button type="submit" class="waves-effect waves-light btn">Guardar</button>