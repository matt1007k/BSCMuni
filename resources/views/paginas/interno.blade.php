@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content">                            
                    
                    <div class="card-title">Factores Internos</div>
                    <div class="row no-margin text-weight-bold" style="margin: 0 0 10px 0;">
                        <div class="col m5 center-align">
                            <div class="blue text-white "> Tabla de Evaluación </div>
                            <div style="height: 100%;" class="d-flex justify-center align-items-center"> Factores Internos </div>
                
                        </div>
                        <div class="col m6 center-align">
                            <div class="row">
                                <div class="col m4">
                                    <div class="indigo text-white ">Importancia de éxito</div>
                                    <div class="row">
                                        <div class="col m4">Alta (3)</div>
                                        <div class="col m4">Media (2)</div>
                                        <div class="col m4">Baja (1)</div>
                                    </div>
                                </div>
                                <div class="col m6">
                                    <div class="blue text-white ">Desempeño de la empresa</div>
                                    <div class="row">
                                        <div class="col m3">Muy bueno (+2)</div>
                                        <div class="col m3">Bueno (+1)</div>
                                        <div class="col m3">Deficiente (-1)</div>
                                        <div class="col m3">Muy Deficiente (-2)</div>
                                    </div>
                                </div>
                                <div class="col m2 red ">
                                    <div class=" text-white ">Valor ponderado del factor</div>
                                </div>
                            </div>
                        </div>
                            <div class="col m1">
                                
                            </div>
                        </div>
                  
                    @forelse($areas as $area)
                        <div class="row padding-ultra-small no-margin">
                            <div class="col m12 indigo lighten-3 text-white">
                                 <div >{{$area->titulo}} </div>
                            </div>
                        </div>
                        @forelse($area->actividades as $actividad)
                            <div class="row padding-ultra-small no-margin">
                                <div class="col m5 ">
                                    <div >{{$actividad->titulo}} </div>
                                </div>
                                <div class="col m6 center-align">
                
                                    <div class="row ">
                                        <div class="col m4">
                    
                                            <div class="row">
                                                <div class="col m4">
                                                    @if ($actividad->alta > 0)
                                                        {{$actividad->alta}}
                                                    @endif
                                                </div>
                                                <div class="col m4">
                                                    @if ($actividad->media > 0)
                                                        {{$actividad->media}}
                                                    @endif
                                                </div>
                                                <div class="col m4">
                                                    @if ($actividad->baja > 0)
                                                        {{$actividad->baja}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col m6">
                                            <div class="row">
                                                <div class="col m3">
                                                    @if ($actividad->muy_bueno > 0)
                                                       {{ $actividad->muy_bueno}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($actividad->bueno > 0)
                                                        {{$actividad->bueno}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($actividad->deficiente < 0)
                                                        {{$actividad->deficiente}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($actividad->muy_deficiente < 0)
                                                        {{$actividad->muy_deficiente}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col m2">
                                            <div class="text-weight-bold">
                                                @if ($actividad->valor < 0)
                                                    <p class="red-text">{{$actividad->valor}}</p>
                                                @else
                                                    <p class="blue-text"> {{$actividad->valor}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m1">
                                </div>
                            </div>
                        @empty
                            <div class="row no-margin">
                                <div class="col m12">
                                    No tiene actividades
                                </div>
                            </div>
                        @endforelse
                    @empty
                        <div class="row no-margin">
                            <div class="col m12">
                                No tiene ningun registro
                            </div>
                        </div>
                    @endforelse
                  
                    <div class="row no-margin">
                        <div class="col m6">
                            <h5 class="red-text text-weight-bold">Debilidades: Valor Ponderado < 0</h5>
                        </div>
                        <div class="col m6">
                            <h5 class="blue-text text-weight-bold">Fortalezas: Valor Ponderado > 0</h5>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>        
    </div>
@endsection