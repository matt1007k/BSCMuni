@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md">
                <div class="h4">
                    Macroproceso: 
                    @isset($informacion->macroproceso)
                        {{$informacion->macroproceso}}
                    @else
                        Sin macroproceso....
                    @endisset
                    
                </div>
               
            </div>
           
        </div>          
        <div class="row">
            @if (count($procesos) > 0)
            
            @foreach ($procesos as $proceso)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $proceso->titulo }}</h6>
                            
                        </div>
                        <div class="card-body">
                            @forelse ($proceso->subprocesos as $subproceso)
                                <ul class="list-unstyled">
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$subproceso->titulo}}</p>
                                       
                                        </div>
                                    </li>
                                </ul>
                            @empty
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <p>No tiene subprocesos...</p>
                                    </div>
                                    
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                   
                    
                </div>
            @endforeach
            <div class="w-100 text-center">
                {{ $procesos->links() }}
            </div>
        @else
            <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>
        
@endsection