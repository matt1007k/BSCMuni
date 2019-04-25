@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content">                            
                    
                    <div class="card-title">Factores Externo</div>
                    <div class="row no-margin text-weight-bold" style="margin: 0 0 10px 0;">
                        <div class="col m5 center-align">
                            <div class="blue text-white "> Tabla de Evaluación </div>
                            <div style="height: 100%;" class="d-flex justify-center align-items-center"> Factores Externo </div>
                
                        </div>
                        <div class="col m6 center-align">
                            <div class="row">
                                <div class="col m4">
                                    <div class="indigo text-white ">Probabilidad de Ocurrencia</div>
                                    <div class="row">
                                        <div class="col m4">Alta (3)</div>
                                        <div class="col m4">Media (2)</div>
                                        <div class="col m4">Baja (1)</div>
                                    </div>
                                </div>
                                <div class="col m6">
                                    <div class="blue text-white ">Impacto a nuestro negocio</div>
                                    <div class="row">
                                        <div class="col m3">Muy positivo (+2)</div>
                                        <div class="col m3">Positivo (+1)</div>
                                        <div class="col m3">Negativo (-1)</div>
                                        <div class="col m3">Muy negativo (-2)</div>
                                    </div>
                                </div>
                                <div class="col m2 red ">
                                    <div class="text-white">Valor ponderado del factor</div>
                                </div>
                            </div>
                        </div>
                            <div class="col m1">
                                
                            </div>
                        </div>
                  
                    @forelse($fuerzas as $fuerza)
                        <div class="row padding-ultra-small no-margin">
                            <div class="col m12 indigo lighten-3 text-white">
                                 <div >{{$fuerza->titulo}} </div>
                            </div>
                        </div>
                        @forelse($fuerza->factores as $factor)
                            <div class="row padding-ultra-small no-margin">
                                <div class="col m5 ">
                                    <div >{{$factor->titulo}} </div>
                                </div>
                                <div class="col m6 center-align">
                
                                    <div class="row ">
                                        <div class="col m4">
                    
                                            <div class="row">
                                                <div class="col m4">
                                                    @if ($factor->alta > 0)
                                                        {{$factor->alta}}
                                                    @endif
                                                </div>
                                                <div class="col m4">
                                                    @if ($factor->media > 0)
                                                        {{$factor->media}}
                                                    @endif
                                                </div>
                                                <div class="col m4">
                                                    @if ($factor->baja > 0)
                                                        {{$factor->baja}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col m6">
                                            <div class="row">
                                                <div class="col m3">
                                                    @if ($factor->muy_positivo > 0)
                                                       {{ $factor->muy_positivo}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($factor->positivo > 0)
                                                        {{$factor->positivo}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($factor->negativo < 0)
                                                        {{$factor->negativo}}
                                                    @endif
                                                </div>
                                                <div class="col m3">
                                                    @if ($factor->muy_negativo < 0)
                                                        {{$factor->muy_negativo}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col m2">
                                            <div class="text-weight-bold">
                                                @if ($factor->valor < 0)
                                                    <p class="red-text">{{$factor->valor}}</p>
                                                @else
                                                    <p class="blue-text"> {{$factor->valor}}</p>
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
                                    No tiene factores
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
                            <h5 class="red-text text-weight-bold">Amenazas: Valor Ponderado < 0</h5>
                        </div>
                        <div class="col m6">
                            <h5 class="blue-text text-weight-bold">Oportunidades: Valor Ponderado > 0</h5>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>        
    </div>
@endsection