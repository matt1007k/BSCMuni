@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header text-center text-white bg-dark h3">Registrar subproceso</div>
                <div class="card-body ">                            
                    
                    <form action="{{route('subprocesos.store')}}" method="POST">
                            @include('admin.subprocesos._form', ['btnT' => 'Guardar'])
                    </form>
                </div>
            </div>
            <a href="{{route('procesos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a Procesos
            </a>
 
        </div>        
    </div>
@endsection