@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Perspectiva: {{$perspectiva->titulo}}</h3>
        <p class="mb-4">Grafica de resumen de maestro</p>

        <div class="row">
            @foreach($objetivos as $objetivo)
            <div class="card col-md-6">
                <div class="card-header h4 text-white bg-dark">
                    Objetivo: {{ $objetivo['objetivo'] }}
                </div>
                <div class="card-body">
                    <grafica-resumen :datos='@json($objetivo['indicadores'])'></grafica-resumen>    
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
