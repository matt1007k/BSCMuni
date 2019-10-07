@extends('layouts.app')

@section('content')

<div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('factores.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Editar fuerza</div>
                <div class="card-body">  
                    <form action="{{route('fuerzas.update', $fuerza->id)}}" method="POST">
                        @method('put')
                        
                        @include('admin.fuerzas._form')
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection