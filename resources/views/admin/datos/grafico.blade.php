@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4>Gráficas del objetivo: {{$objetivo->contenido}}</h4>
            <p>Comparar datos de cada indicador</p>
           <div class="row">
                @foreach ($indicadores as $indicador)
                    <div class="col-md-6">
                        <div class="card border-dark">
                            <div class="card-header h5 bg-dark text-white text-center">Gráfica del indicador</div>
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between">
                                    <span class="h6">{{ $indicador['indicador']['indicador'] }}</span>
                                    {{-- <span class="text-success h4">Meta a cumplir: {{ $indicador['meta'] }}</span> --}}
                                </div>
                                <grafica-datos :datos='@json($indicador['datos_grafica'])'></grafica-datos>    
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
            
            
            <a href="{{route('datos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a los datos 
            </a>
        </div>
    </div>
</div>
@endsection