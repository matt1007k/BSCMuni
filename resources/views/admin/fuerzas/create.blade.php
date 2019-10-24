@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Registrar fuerza</div>
                <div class="card-body">  
                    <form action="{{route('fuerzas.store')}}" method="POST">
                        
                        @include('admin.fuerzas._form', ['btnT' => 'Registrar'])
                    </form>
                </div>
            </div>
            <a href="{{route('factores.index')}}" class="btn btn-link text-uppercase">
                <- Ir a las 5 fuerzas de porter
            </a>

        </div>        
    </div>
@endsection