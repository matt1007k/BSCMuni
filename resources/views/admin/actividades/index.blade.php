@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md">
                <div class="h3 text-center">
                    Cadena de valor
                </div>
                <a href="{{route('areas.create')}}" class="btn btn-success">
                    Agregar area
                </a>
            </div>
        </div>          
        <div class="row">
            @if (count($areas) > 0)
            <div class="mb-1">
                <a href="{{route('actividades.create')}} " class="btn btn-link">Agregar actividad</a>
            </div> 
                @foreach ($areas as $area)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-md-10">  
                                <h6 class="h5">{{ $area->titulo }}</h6>
                            </div>
                            <div class="col-md d-flex">                                    
                                <a href="{{route('areas.edit',$area->id)}} " class="btn btn-info btn-sm">
                                   Editar 
                                </a>
                                <form action="{{route('areas.destroy',$area->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            @forelse ($area->actividades as $actividad)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">                                
                                            <div class="col-md-9">
                                                <p>{{$actividad->titulo}}</p>
                                            </div>
                                            <div class="col-md d-flex">                                    
                                                <a href="{{route('actividades.edit',$actividad->id)}}" class="btn btn-info btn-sm">
                                                    Editar
                                                </a>
                                                <form action="{{route('actividades.destroy',$actividad->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>  
                                            
                                        </div>
                                    </li>
                                </ul>
                            @empty
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <p>No tiene actividades...</p>
                                    </div>
                                    
                                </div>
                            @endforelse
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