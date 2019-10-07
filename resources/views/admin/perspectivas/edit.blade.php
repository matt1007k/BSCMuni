@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('objetivos.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Editar perspectiva</div>
                <div class="card-body">  
                    <form action="{{route('perspectivas.update', $perspectiva->id)}}" method="POST">
                        @method('put')
                        
                        @include('admin.perspectivas._form')
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection