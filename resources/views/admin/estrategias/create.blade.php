@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{url('/foda?tipo='.$tipo)}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3 text-center">Registrar estrategia de {{$tipo}}</div>
                <div class="card-body">   
                    <form action="{{route('estrategias.store')}}" method="POST">
                       @include('admin.estrategias._form') 
                    </form>
            
                </div>
            </div>
            
        </div>        
    </div>
@endsection