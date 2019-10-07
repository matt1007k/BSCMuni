@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <a href="{{route('datos.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">
                <div class="card-header h3 text-center">Editar datos de un indicador</div>
                <div class="card-body ">
                    <form action="{{route('datos.update', $dato->id)}}" method="POST">
                        @method('PUT')
                        @include('admin.datos._form')
                    </form>
    
                </div>
            </div>
    
        </div>
    </div>
</div>
@endsection