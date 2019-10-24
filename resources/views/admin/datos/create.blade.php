@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">
                <div class="card-header h3 bg-dark text-white text-center">Registrar datos</div>
                <div class="card-body">
                    <form action="{{route('datos.store')}}" method="POST">                        
                        @include('admin.datos._form', ['btnT' => 'Registrar'])
                    </form>
 
                </div>
            </div>
            <a href="{{route('datos.index')}}" class="btn btn-link text-uppercase">
                <- Ir a datos 
            </a>

        </div>
    </div>
</div>
@endsection