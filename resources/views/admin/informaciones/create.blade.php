@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('informaciones.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header font-weight-bold h3">Registrar información</div>
                <div class="card-body">                           
                
                    <form action="{{route('informaciones.store')}}" method="POST">
                        
                        @include('admin.informaciones._form')
                        
                    </form>
            
                </div>
            </div>
            
        </div>        
    </div>
@endsection