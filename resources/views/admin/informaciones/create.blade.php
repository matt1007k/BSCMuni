@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-dark">                
                <div class="card-header text-white text-center bg-dark font-weight-bold h3">Registrar información</div>
                <div class="card-body">                           
                
                    <form action="{{route('informaciones.store')}}" method="POST">
                        
                        @include('admin.informaciones._form', ['btnT' => 'Registrar'])
                        
                    </form>
            
                </div>
            </div>
            <a href="{{route('informaciones.index')}}" class="btn btn-link text-uppercase">
                <- Regresar
            </a>
        </div>        
    </div>
@endsection