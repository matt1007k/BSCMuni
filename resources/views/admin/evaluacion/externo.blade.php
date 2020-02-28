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
        <div class="col-md-12  bg-white shadow-lg">

            <div class="row mt-3 text-weight-bold" style="margin: 0 0 10px 0;">
                <div class="col-md-5 text-center text-small">
                    <div class="bg-primary text-white "> Tabla de Evaluación </div>
                    <div style="height: 100%;" class="d-flex justify-content-center align-items-center"> Factores
                        Externo </div>

                </div>
                <div class="col-md text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bg-dark text-white  text-small">Probabilidad de Ocurrencia</div>
                            <div class="row text-small">
                                <div class="col-md-4">Alta (3)</div>
                                <div class="col-md-4">Media (2)</div>
                                <div class="col-md-4">Baja (1)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-primary text-white text-small">Impacto a nuestro negocio</div>
                            <div class="row text-small">
                                <div class="col-md-3">Muy positivo (+2)</div>
                                <div class="col-md-3">Positivo (+1)</div>
                                <div class="col-md-3">Negativo (-1)</div>
                                <div class="col-md-3">Muy negativo (-2)</div>
                            </div>
                        </div>
                        <div class="col-md-2 bg-danger d-flex align-items-center">
                            <div class="text-white  text-small">Valor ponderado del factor</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            @forelse($fuerzas as $fuerza)
            <div class="row px-2 py-3">
                <div class="col-md-12 text-dark font-weight-bold text-uppercase">
                    <div class="h4">{{$fuerza->titulo}} </div>
                </div>
            </div>
            @forelse($fuerza->factores as $factor)
            <div class="row px-2 py-3">
                <div class="col-md-5 pl-4">
                    <div>
                        <i class="mdi mdi-arrow-right mr-2 text-info"></i>
                        {{$factor->titulo}}
                    </div>
                </div>
                <div class="col-md-6 text-center ">

                    <div class="row ">
                        <div class="col-md-4">

                            <div class="row">
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($factor->alta > 0)
                                    {{$factor->alta}}
                                    @endif
                                </div>
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($factor->media > 0)
                                    {{$factor->media}}
                                    @endif
                                </div>
                                <div class="col-md-4 text-small font-weight-bold">
                                    @if ($factor->baja > 0)
                                    {{$factor->baja}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($factor->muy_positivo > 0)
                                    {{ $factor->muy_positivo}}
                                    @endif
                                </div>
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($factor->positivo > 0)
                                    {{$factor->positivo}}
                                    @endif
                                </div>
                                <div class="col-md-3 text-small font-weight-bold">
                                    @if ($factor->negativo < 0) {{$factor->negativo}} @endif </div> <div
                                        class="col-md-3 text-small font-weight-bold">
                                        @if ($factor->muy_negativo < 0) {{$factor->muy_negativo}} @endif </div> </div>
                                            </div> <div class="col-md-2 text-small font-weight-bold">
                                            <div class="text-weight-bold">
                                                @if ($factor->valor < 0) <p class="text-danger">
                                                    {{$factor->valor}}
                                                    </p>
                                                    @else
                                                    <p class="text-primary"> {{$factor->valor}}</p>
                                                    @endif
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <a href="{{route('factor.externoEditar', $factor->id)}}"
                                class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                data-placement="top" title="Evaluar">
                                <i class="mdi mdi-format-list-checks"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="row no-margin">
                        <div class="col-md-12 pl-4 font-italic">
                            No tiene factores
                        </div>
                    </div>
                    @endforelse
                    @empty
                    <div class="row no-margin">
                        <div class="col-md-12 pl-4 font-italic">
                            No tiene ningun registro
                        </div>
                    </div>
                    @endforelse
                    <div class="d-flex justify-content-center">
                        {{$fuerzas->links()}}
                    </div>

                    <div class="row my-3">
                        <div class="col-md-6 text-center">
                            <h5 class="text-danger font-weight-bold h4">Amenazas: Valor Ponderado < 0</h5> </div> <div
                                    class="col-md-6 text-center">
                                    <h5 class="text-primary font-weight-bold h4">Oportunidades: Valor Ponderado > 0</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection