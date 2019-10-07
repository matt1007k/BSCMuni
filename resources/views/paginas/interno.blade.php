@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">                
            <div class="h2 text-center">Factores Internos</div>
            <div class="card-body">                            
                
                <div class="row no-margin text-weight-bold" style="margin: 0 0 10px 0;">
                    <div class="col-md-5 text-center">
                        <div class="bg-info text-white "> Tabla de Evaluación </div>
                        <div style="height: 100%;" class="d-flex justify-center align-items-center"> Factores Internos </div>
            
                    </div>
                    <div class="col-md text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bg-secondary text-white ">Importancia de éxito</div>
                                <div class="row">
                                    <div class="col-md-4">Alta (3)</div>
                                    <div class="col-md-4">Media (2)</div>
                                    <div class="col-md-4">Baja (1)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-primary text-white ">Desempeño de la empresa</div>
                                <div class="row">
                                    <div class="col-md-3">Muy bueno (+2)</div>
                                    <div class="col-md-3">Bueno (+1)</div>
                                    <div class="col-md-3">Deficiente (-1)</div>
                                    <div class="col-md-3">Muy Deficiente (-2)</div>
                                </div>
                            </div>
                            <div class="col-md-2 bg-danger d-flex align-items-center">
                                <div class=" text-white ">Valor ponderado del factor</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
              
                @forelse($areas as $area)
                    <div class="row padding-ultra-small no-margin">
                        <div class="col-md-12 bg-secondary text-white">
                             <div >{{$area->titulo}} </div>
                        </div>
                    </div>
                    @forelse($area->actividades as $actividad)
                        <div class="row padding-ultra-small no-margin">
                            <div class="col-md-5 ">
                                <div >{{$actividad->titulo}} </div>
                            </div>
                            <div class="col-md-6 text-center ">
            
                                <div class="row ">
                                    <div class="col-md-4">
                
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if ($actividad->alta > 0)
                                                    {{$actividad->alta}}
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if ($actividad->media > 0)
                                                    {{$actividad->media}}
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if ($actividad->baja > 0)
                                                    {{$actividad->baja}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                @if ($actividad->muy_bueno > 0)
                                                   {{ $actividad->muy_bueno}}
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                @if ($actividad->bueno > 0)
                                                    {{$actividad->bueno}}
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                @if ($actividad->deficiente < 0)
                                                    {{$actividad->deficiente}}
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                @if ($actividad->muy_deficiente < 0)
                                                    {{$actividad->muy_deficiente}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-weight-bold">
                                            @if ($actividad->valor < 0)
                                                <p class="text-danger">{{$actividad->valor}}</p>
                                            @else
                                                <p class="text-primary"> {{$actividad->valor}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row no-margin">
                            <div class="col-md-12">
                                No tiene actividades
                            </div>
                        </div>
                    @endforelse
                @empty
                    <div class="row no-margin">
                        <div class="col-md-12">
                            No tiene ningun registro
                        </div>
                    </div>
                @endforelse
                <div class="w-100 text-center">
                    {{$areas->links()}}
                </div>
              
                <div class="row no-margin">
                    <div class="col-md-6">
                        <h5 class="text-danger text-weight-bold">Debilidades: Valor Ponderado < 0</h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary text-weight-bold">Fortalezas: Valor Ponderado > 0</h5>
                    </div>
                </div>
            </div>
        </div>
        
    </div>        
</div>
@endsection