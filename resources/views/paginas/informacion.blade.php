@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md">                                   
                <div class="row mb-2 d-flex">
                    <div class="col-md">
                        <div class="h3 ">
                            Datos de la organización
                        </div>
                        
                    </div>
                    
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