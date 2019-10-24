@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">
                <div class="card-header h3 bg-dark text-white text-center">Editar datos</div>
                <div class="card-body ">
                    <form action="{{route('datos.update', $dato->id)}}" method="POST">
                        @method('PUT')
                        @include('admin.datos._form', ['btnT' => 'Editar'])
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