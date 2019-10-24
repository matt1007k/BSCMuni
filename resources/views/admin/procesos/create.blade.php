@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header text-center text-white bg-dark h3">Registrar proceso</div>
                <div class="card-body">                           
                    
                    <form action="{{route('procesos.store')}}" method="POST">
                            @csrf
                            @include('admin.procesos._form', ['btnT' => 'Guardar'])
                        </form>
                        
                </div>
            </div>
            
            <a href="{{route('procesos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a procesos 
            </a>
        </div>        
    </div>
@endsection