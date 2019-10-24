@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white text-center h3">Registrar objetivo</div>
                <div class="card-body">  
                    <form action="{{route('objetivos.store')}}" method="POST">
                        
                        @include('admin.objetivos._form', ['btnT' => 'Registrar'])
                    </form>
                </div>
            </div>
            <a href="{{route('objetivos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a los objetivos
            </a>

        </div>        
    </div>
@endsection