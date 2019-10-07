@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('paginas.datos')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">
                <div class="card-header h3 text-center">Grafica del indicador</div>
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <span class="h5">{{ $indicador->indicador }}</span>
                        <span class="text-success h4">Meta a cumplir: {{ $indicador->meta }}</span>
                    </div>
                    <grafica-datos :datos='@json($datos)'></grafica-datos>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection