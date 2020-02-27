@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Factores Externos</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('factor.interno') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Factores Externos
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('fce.cm') }}">
                        FCE vs CM
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
        <div class="col-md-12">

            <div class="row no-margin text-weight-bold" style="margin: 0 0 10px 0;">
                <div class="col-md-5 text-center">
                    <div class="bg-primary text-white "> Tabla de Evaluación </div>
                    <div style="height: 100%;" class="d-flex justify-center align-items-center"> Factores Externo </div>

                </div>
                <div class="col-md text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bg-secondary text-white ">Probabilidad de Ocurrencia</div>
                            <div class="row">
                                <div class="col-md-4">Alta (3)</div>
                                <div class="col-md-4">Media (2)</div>
                                <div class="col-md-4">Baja (1)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-primary text-white ">Impacto a nuestro negocio</div>
                            <div class="row">
                                <div class="col-md-3">Muy positivo (+2)</div>
                                <div class="col-md-3">Positivo (+1)</div>
                                <div class="col-md-3">Negativo (-1)</div>
                                <div class="col-md-3">Muy negativo (-2)</div>
                            </div>
                        </div>
                        <div class="col-md-2 bg-danger d-flex align-items-center">
                            <div class="text-white">Valor ponderado del factor</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            @forelse($fuerzas as $fuerza)
            <div class="row padding-ultra-small no-margin">
                <div class="col-md-12 bg-secondary text-white">
                    <div>{{$fuerza->titulo}} </div>
                </div>
            </div>
            @forelse($fuerza->factores as $factor)
            <div class="row padding-ultra-small no-margin">
                <div class="col-md-5 ">
                    <div>{{$factor->titulo}} </div>
                </div>
                <div class="col-md-6 text-center">

                    <div class="row ">
                        <div class="col-md-4">

                            <div class="row">
                                <div class="col-md-4">
                                    @if ($factor->alta > 0)
                                    {{$factor->alta}}
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if ($factor->media > 0)
                                    {{$factor->media}}
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if ($factor->baja > 0)
                                    {{$factor->baja}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    @if ($factor->muy_positivo > 0)
                                    {{ $factor->muy_positivo}}
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if ($factor->positivo > 0)
                                    {{$factor->positivo}}
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if ($factor->negativo < 0) {{$factor->negativo}} @endif </div> <div
                                        class="col-md-3">
                                        @if ($factor->muy_negativo < 0) {{$factor->muy_negativo}} @endif </div> </div>
                                            </div> <div class="col-md-2">
                                            <div class="text-weight-bold">
                                                @if ($factor->valor < 0) <p class="text-danger">{{$factor->valor}}</p>
                                                    @else
                                                    <p class="text-primary"> {{$factor->valor}}</p>
                                                    @endif
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <a href="{{route('factor.externoEditar', $factor->id)}}"
                                class="btn btn-outline-info btn-sm text-uppercase">
                                Evaluar
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="row no-margin  mb-3">
                        <div class="col-md-12">
                            No tiene factores
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
                        {{$fuerzas->links()}}
                    </div>

                    <div class="row no-margin">
                        <div class="col-md-6">
                            <h5 class="text-danger text-weight-bold">Amenazas: Valor Ponderado < 0</h5> </div> <div
                                    class="col-md-6">
                                    <h5 class="text-primary text-weight-bold">Oportunidades: Valor Ponderado > 0</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection