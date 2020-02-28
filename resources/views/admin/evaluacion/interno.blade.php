@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Factores Internos</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('fuerzas.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Las 5 Fuerzas de Porter
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('factor.externo') }}">
                        Factores Externos
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="">

    <div class="row">
        <div class="col-md-12 bg-white shadow-lg">

            <div class="row mt-3 text-weight-bold" style="margin: 0 0 10px 0;">
                <div class="col-md-5 text-center text-small">
                    <div class="bg-info text-white "> Tabla de Evaluación </div>
                    <div style="height: 100%;" class="d-flex justify-content-center align-items-center">
                        Factores Internos
                    </div>

                </div>
                <div class="col-md text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bg-warning text-white text-small">Importancia de éxito</div>
                            <div class="row text-small">
                                <div class="col-md-4">Alta (3)</div>
                                <div class="col-md-4">Media (2)</div>
                                <div class="col-md-4">Baja (1)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-primary text-white text-small">Desempeño de la empresa</div>
                            <div class="row text-small">
                                <div class="col-md-3">Muy bueno (+2)</div>
                                <div class="col-md-3">Bueno (+1)</div>
                                <div class="col-md-3">Deficiente (-1)</div>
                                <div class="col-md-3">Muy Deficiente (-2)</div>
                            </div>
                        </div>
                        <div class="col-md-2 bg-danger d-flex align-items-center">
                            <div class="text-small text-white">Valor ponderado del factor</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            @forelse($areas as $area)
            <div class="row px-2 py-3">
                <div class="col-md-12 text-dark font-weight-bold text-uppercase">
                    <div class="h4">{{$area->titulo}} </div>
                </div>
            </div>
            @forelse($area->actividades as $actividad)
            <div class="row px-2 py-3">
                <div class="col-md-5 pl-4">
                    <div>
                        <i class="mdi mdi-arrow-right mr-2 text-info"></i>
                        {{$actividad->titulo}}
                    </div>
                </div>
                <div class="col-md-6 text-center ">

                    <div class="row ">
                        <div class="col-md-4">

                            <div class="row">
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($actividad->alta > 0)
                                    {{$actividad->alta}}
                                    @endif
                                </div>
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($actividad->media > 0)
                                    {{$actividad->media}}
                                    @endif
                                </div>
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($actividad->baja > 0)
                                    {{$actividad->baja}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($actividad->muy_bueno > 0)
                                    {{ $actividad->muy_bueno}}
                                    @endif
                                </div>
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($actividad->bueno > 0)
                                    {{$actividad->bueno}}
                                    @endif
                                </div>
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($actividad->deficiente < 0) {{$actividad->deficiente}} @endif </div> <div
                                        class="col-md-3 text-small font-weight-bold">
                                        @if ($actividad->muy_deficiente < 0) {{$actividad->muy_deficiente}} @endif
                                            </div> </div> </div> <div class="col-md-2 text-small font-weight-bold">
                                            <div class="text-weight-bold">
                                                @if ($actividad->valor < 0) <p class="text-danger">
                                                    {{$actividad->valor}}
                                                    </p>
                                                    @else
                                                    <p class="text-primary"> {{$actividad->valor}}</p>
                                                    @endif
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <a href="{{route('factor.internoEditar', $actividad->id)}}"
                                class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                data-placement="top" title="Evaluar">
                                <i class="mdi mdi-format-list-checks"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="row no-margin">
                        <div class="col-md-12 ml-4 font-italic">
                            No tiene actividades
                        </div>
                    </div>
                    @endforelse
                    @empty
                    <div class="row no-margin">
                        <div class="col-md-12 ml-4 font-italic">
                            No tiene ningun registro
                        </div>
                    </div>
                    @endforelse
                    <div class="d-flex justify-content-center">
                        {{$areas->links()}}
                    </div>

                    <div class="row my-3">
                        <div class="col-md-6 text-center">
                            <div class="text-danger font-weight-bold h4">Debilidades: Valor Ponderado < 0</div> </div>
                                    <div class="col-md-6 text-center">
                                    <div class="text-primary font-weight-bold h4">Fortalezas: Valor Ponderado > 0</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endsection