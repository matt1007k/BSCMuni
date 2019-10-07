@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('objetivos.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Editar objetivo</div>
                <div class="card-body">                            
                    
                    <form action="{{route('objetivos.update', $objetivo->id)}}" method="POST">
                        @method('PUT')
                        @include('admin.objetivos._form')
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection