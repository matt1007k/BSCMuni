@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md">                                   
                <div class="row mb-2 d-flex">
                    <div class="col-md">
                        <div class="h3">
                            Datos de la organización
                        </div>
                        
                    </div>
                    @if ($informaciones->count() < 1)                        
                        <a href="{{route('informaciones.create')}}" class="ml-2 btn btn-outline-success text-uppercase">
                            + datos
                        </a>
                    @endif
                </div>  
                <div class="row">    
                    <div class="col-md-12">
                        @forelse ($informaciones as $informacion)
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-8">
                                    <div class="card-title h4">{{ $informacion->nombre }}</div>
                                    <div class="card-text"><span class="font-weight-bold">Macroproceso: </span>{{ $informacion->macroproceso }}</div>
                                    <div class="d-flex">
                                        <span class="font-weight-bold mr-2">Vision: </span> {{ $informacion->vision }}
                                    </div>
                                    <div class="d-flex">
                                        <span class="font-weight-bold mr-2">Mision: </span> {{ $informacion->mision }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('informaciones.edit', $informacion->id) }}" class="mb-1 btn btn-outline-info text-uppercase font-weight-bold">
                                        - Editar
                                    </a>
                                    <form action="{{route('informaciones.destroy', $informacion->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger text-uppercase">x Eliminar</button>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @empty                                        
                             
                        <div class="h3">No hay ningún registro!!!</div>
                            
                    @endforelse
                    <div class="w-100 text-center">
                        {{ $informaciones->links() }}
                    </div>   
                </div>
            </div>      
        </div>
    </div>
@endsection