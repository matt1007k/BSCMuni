@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Evaluar actividad: <span class="font-italic text-muted">"{{$actividad->titulo}}"</span>
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('factor.interno') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Factores Internos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('factor.evaluacionInterno', $actividad->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <h6>Importancia de éxito</h6>
                        <div class="input-field col m4">
                            <label>
                                <input type="radio" name="importancia" value="3"
                                    {{$actividad->alta == '3' ? 'checked' : ''}} />
                                <span>Alta (3)</span>
                            </label>
                        </div>
                        <div class="input-field col m4">
                            <label>
                                <input type="radio" name="importancia" value="2"
                                    {{$actividad->media == '2' ? 'checked' : ''}} />
                                <span>Media (2)</span>
                            </label>
                        </div>
                        <div class="input-field col m4">
                            <label>
                                <input type="radio" name="importancia" value="1"
                                    {{$actividad->baja == '1' ? 'checked' : ''}} />
                                <span>Baja (1)</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6>Desempeño de la empresa</h6>
                        <div class="input-field col m3 mb-2">
                            <label>
                                <input type="radio" name="desempeno" value="2"
                                    {{$actividad->muy_bueno == '2' ? 'checked' : ''}} />
                                <span>Muy Bueno (+2)</span>
                            </label>
                        </div>
                        <div class="input-field col m3 mb-2">
                            <label>
                                <input type="radio" name="desempeno" value="1"
                                    {{$actividad->bueno == '1' ? 'checked' : ''}} />
                                <span>Bueno (+1)</span>
                            </label>
                        </div>
                        <div class="input-field col m3 mb-2">
                            <label>
                                <input type="radio" name="desempeno" value="-1"
                                    {{$actividad->deficiente == '-1' ? 'checked' : ''}} />
                                <span>Deficiente (-1)</span>
                            </label>
                        </div>
                        <div class="input-field col m3 mb-2">
                            <label>
                                <input type="radio" name="desempeno" value="-2"
                                    {{$actividad->muy_deficiente == '-2' ? 'checked' : ''}} />
                                <span>Muy Deficiente (-2)</span>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col m12">
                            <button type="submit" class="btn btn-success">Evaluar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection