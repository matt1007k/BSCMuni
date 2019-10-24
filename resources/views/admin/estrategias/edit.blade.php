@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
           
            <div class="card border-dark">                
                <div class="card-header h3 bg-dark text-white text-center">Editar estrategia de {{$tipo}}</div>
                <div class="card-body ">   
                    <form action="{{route('estrategias.update', $estrategia->id)}}" method="POST">
                        @method('put')
                       @include('admin.estrategias._form', ['btnT' => 'Editar']) 
                    </form>
            
                </div>
            </div>
            <a href="{{url('/foda?tipo='.$tipo)}}" class="btn btn-link text-uppercase">
                <- Ir a matriz foda 
            </a>
        </div>        
    </div>
@endsection