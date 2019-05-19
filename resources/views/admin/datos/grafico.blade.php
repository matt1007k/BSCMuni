@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <h4 class="center-align">Grafica de los datos del indicador</h4>
        <grafica-datos :datos='@json($datos)'></grafica-datos>


    </div>
</div>
@endsection