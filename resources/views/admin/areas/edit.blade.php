@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Editar area</div>
                <div class="card-body">  
                    <form action="{{route('areas.update', $area->id)}}" method="POST">
                        @method('put')
                        
                        @include('admin.areas._form', ['btnT' => 'Editar'])
                    </form>
                </div>
            </div>
            <a href="{{route('actividades.index')}}" class="btn btn-link text-uppercase">
                <- Ir a cadena de valor
            </a>

        </div>        
    </div>
@endsection