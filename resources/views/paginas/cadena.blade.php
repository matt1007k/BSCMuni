@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-md">
                <div class="h4">
                    Cadena de valor
                </div>
            </div>
        </div> 
        <p class="mb-3">Todas las actividades que se realizan en la empresa.</p>         
        <div class="row">
            @if (count($areas) > 0)
            @foreach ($areas as $area)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $area->titulo }}</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled no-margin">
                                @forelse ($area->actividades as $actividad)
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$actividad->titulo}}</p>
                                            
                                        </div>
                                    </li>
                                    @empty
                                    <li>
                                        <p class="no-margin">No tiene actividades.</p>
                                    </li> 
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    
                   
                    
                </div>
            @endforeach
            <div class="w-100 text-center">
                {{ $areas->links() }}
            </div>
        @else
            <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>  
@endsection