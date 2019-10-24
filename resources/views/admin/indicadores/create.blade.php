@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card border-dark">
                <div class="card-header h3 bg-dark text-white text-center">Registrar indicador</div>
                <div class="card-body">
                    <form action="{{route('indicadores.store')}}" method="POST">                    
                       @include('admin.indicadores._form', ['btnT' => 'Registrar']) 
                    </form>
    
                </div>
            </div>
            <a href="{{route('indicadores.index')}}" class="btn btn-link text-uppercase">
                <- Ir a los indicadores
            </a>
   
        </div>
    </div>
</div>
@endsection