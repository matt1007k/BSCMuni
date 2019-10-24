@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Registrar actividad</div>
                <div class="card-body ">                            
                    
                    <form action="{{route('actividades.store')}}" method="POST">
                            @include('admin.actividades._form', ['btnT' => 'Registrar'])
                    </form>
                </div>
            </div>
            <a href="{{route('actividades.index')}}" class="btn btn-link text-uppercase">
                <- Ir a cadena de valor 
            </a>

        </div>        
    </div>
@endsection