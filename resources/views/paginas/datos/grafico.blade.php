@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <a href="{{route('paginas.datos')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> datos
        </a>
        <h4 class="center-align">Grafica de los datos del indicador</h4>
        <grafica-datos :datos='@json($datos)'></grafica-datos>


    </div>
</div>
@endsection