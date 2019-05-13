@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m6 offset-m3">
        <a href="{{route('indicadores.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> Indicadores
        </a>
        <div class="card">
            <div class="card-content ">
                <div class="card-title">Nuevo indicador</div>
                <form action="{{route('indicadores.store')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$objetivo_id}}" name="objetivo_id" />
                    <div class="row">
                        <div class="input-field col m12">
                            <textarea name="indicador" id="indicador" class="materialize-textarea"></textarea>
                            <label for="indicador">Indicador</label>
                            @if ($errors->has('indicador'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('indicador') }}
                            </span>
                            @endif
                        </div>
                        <div class="input-field col m12">
                            <select name="tipo" id="tipo">
                                <option value="numero">Número (Solo cantidad)</option>
                                <option value="incremento">Incrementar en %</option>
                                <option value="reducir">Reducir en %</option>
                                <option value="porcentaje">Porcentaje normal (Sin reducir o incrementar)</option>
                            </select>
                            <label>Seleccione el tipo de indicador</label>
                            @if ($errors->has('tipo'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('tipo') }}
                            </span>
                            @endif
                        </div>
                        <div class="input-field col m12">
                            <input name="unidad" type="text" id="unidad" class="validate">
                            <label for="unidad">Unidad del indicador</label>
                            @if ($errors->has('unidad'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('unidad') }}
                            </span>
                            @endif
                        </div>
                        <div class="input-field col m12">
                            <input name="tiempo" type="text" id="tiempo" class="validate">
                            <label for="tiempo">Tiempo del indicador</label>
                            @if ($errors->has('tiempo'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('tiempo') }}
                            </span>
                            @endif
                        </div>
                        <div class="input-field col m12">
                            <input name="meta" type="text" id="meta" class="validate">
                            <label for="meta">Meta a alcanzar (ejm: 20)</label>
                            @if ($errors->has('meta'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('meta') }}
                            </span>
                            @endif
                        </div>
                        <h5>Semáforo</h5>
                        <div class="input-field col m12">
                            <input name="verde" type="text" id="verde" class="validate">
                            <label for="verde">Verde (ejm: < 20)</label> @if ($errors->has('verde'))
                                    <span class="helper-text red-text darken-1">
                                        {{ $errors->first('verde') }}
                                    </span>
                                    @endif
                        </div>
                        <div class="input-field col m12">
                            <input name="amarillo" type="text" id="amarillo" class="validate">
                            <label for="amarillo">Amarillo (ejm: <= 30)</label> @if ($errors->has('amarillo'))
                                    <span class="helper-text red-text darken-1">
                                        {{ $errors->first('amarillo') }}
                                    </span>
                                    @endif
                        </div>
                        <div class="input-field col m12">
                            <input name="rojo" type="text" id="rojo" class="validate">
                            <label for="rojo">Rojo (ejm: > 40)</label>
                            @if ($errors->has('rojo'))
                            <span class="helper-text red-text darken-1">
                                {{ $errors->first('rojo') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="waves-effect waves-light btn">Guardar</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection