@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <a href="{{route('indicadores.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">
                <div class="card-header h3 text-center">Editar indicador del objetivo</div>
                <div class="card-body ">
                    <form action="{{route('indicadores.update', $indicador->id)}}" method="POST">
                        @method('put')
                        @include('admin.indicadores._form')  
                    </form>
    
                </div>
            </div>
    
        </div>
    </div>

</div>
@endsection