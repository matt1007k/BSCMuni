@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">
            Mapa Estratégico
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('perspectivas.index') }}">
                        Objetivos Estratégico
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('indicadores.index') }}">
                        Indicadores
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <h3>Perspectiva: {{$perspectiva->titulo}}</h3>
    <p class="mb-4">Grafica de resumen de maestro</p>

    <div class="row">
        @foreach($objetivos as $objetivo)
        <div class="card col-md-6">
            <div class="card-header h4 text-white bg-dark">
                Objetivo: @json($objetivo['objetivo'])
            </div>
            <div class="card-body">
                <grafica-resumen :datos='@json($objetivo[' indicadores'])'></grafica-resumen>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection