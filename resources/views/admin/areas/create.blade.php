@extends('layouts.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('actividades.index')}}" class="btn btn-secondary">
                <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Registrar area</div>
                <div class="card-body">                           
                
                    <form action="{{route('areas.store')}}" method="POST">
                        @csrf
                        @include('admin.areas._form')
                    </form>
            
                </div>
            </div>
            
        </div>        
    </div>
@endsection