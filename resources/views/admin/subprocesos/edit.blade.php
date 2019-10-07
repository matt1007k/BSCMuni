@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('procesos.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Editar subproceso</div>
                <div class="card-body">                            
                    
                    <form action="{{route('subprocesos.update', $subproceso->id)}}" method="POST">
                        @method('PUT')
                        @include('admin.subprocesos._form')
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection