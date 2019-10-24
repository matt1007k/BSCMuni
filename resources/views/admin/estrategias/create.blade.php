@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-dark">                
                <div class="card-header h3 bg-dark text-white text-center">Registrar estrategia de {{$tipo}}</div>
                <div class="card-body">   
                    <form action="{{route('estrategias.store')}}" method="POST">
                       @include('admin.estrategias._form', ['btnT' => 'Registrar']) 
                    </form>
            
                </div>
            </div>
            <a href="{{url('/foda?tipo='.$tipo)}}" class="btn btn-link text-uppercase">
                <- Ir a matriz foda
            </a>
        </div>        
    </div>
@endsection