@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
           
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center font-weight-bold h4">Editar información</div>
                <div class="card-body">   
                    <form action="{{route('informaciones.update', $informacion->id)}}" method="POST">
                        @method('put')
                        
                        @include('admin.informaciones._form', ['btnT' => 'Editar'])
                    </form>
                </div>
            </div>
            <a href="{{route('informaciones.index')}}" class="btn btn-link text-uppercase">
                <- Regresar
            </a>
            
        </div>        
    </div>
@endsection