@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-md">
                <div class="h4">Las 5 fuerzas de porter</div>
            </div>
            
        </div>          
        <p class=" mb-3">Factores externos que afectan a la empresa.</p>
        <div class="row">
            @if (count($fuerzas) > 0)
            
            @foreach ($fuerzas as $fuerza)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $fuerza->titulo }}</h6>
                            
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled no-margin">
                                @forelse ($fuerza->factores as $factor)
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$factor->titulo}}</p>
                                            
                                        </div>
                                    </li>
                                    @empty
                                    <li>
                                        <p class="no-margin">No tiene factores.</p>
                                    </li> 
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    
                   
                    
                </div>
            @endforeach
            <div class="w-100 text-center">
                {{ $fuerzas->links() }}
            </div>
        @else
            <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>  
@endsection