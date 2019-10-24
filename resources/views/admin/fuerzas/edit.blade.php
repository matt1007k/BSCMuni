@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Editar fuerza</div>
                <div class="card-body">  
                    <form action="{{route('fuerzas.update', $fuerza->id)}}" method="POST">
                        @method('put')
                        
                        @include('admin.fuerzas._form', ['btnT' => 'Editar'])
                    </form>
                </div>
            </div>
            <a href="{{route('factores.index')}}" class="btn btn-link text-uppercase">
                <- Ir a las 5 fuerzas de porter
            </a>

        </div>        
    </div>
@endsection