@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Editar subproceso</div>
                <div class="card-body">                            
                    
                    <form action="{{route('subprocesos.update', $subproceso->id)}}" method="POST">
                        @method('PUT')
                        @include('admin.subprocesos._form', ['btnT' => 'Editar'])
                    </form>
                </div>
            </div>
            <a href="{{route('procesos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a Procesos
            </a>
        </div>        
    </div>
@endsection