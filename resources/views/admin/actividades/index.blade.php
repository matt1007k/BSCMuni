@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-md">
                <div class="h4">
                    Cadena de valor
                </div>
                
               
            </div>
            <a href="{{route('areas.create')}}" class="btn btn-outline-success text-uppercase">
                + area
            </a>
        </div> 
        <p class="mb-3">Todas las actividades que se realizan en la empresa.</p>         
        <div class="row">
            @if (count($areas) > 0)
            <div class="mb-1">
                <a href="{{route('actividades.create')}} " class="btn btn-link text-uppercase">Registrar actividad</a>
            </div> 
            @foreach ($areas as $area)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $area->titulo }}</h6>
                            <div class="d-flex">                                    
                                <a href="{{route('areas.edit',$area->id)}} " class="btn btn-outline-info btn-sm">
                                   - Editar 
                                </a>
                                <form action="{{route('areas.destroy',$area->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                        x Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled no-margin">
                                @forelse ($area->actividades as $actividad)
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$actividad->titulo}}</p>
                                            <div class="d-flex">                                    
                                                <a href="{{route('actividades.edit',$actividad->id)}}" class="btn btn-outline-info btn-sm">
                                                    - Editar
                                                </a>
                                                <form action="{{route('actividades.destroy',$actividad->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                                        x Eliminar
                                                    </button>
                                                </form>
                                            </div>  
                                            
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