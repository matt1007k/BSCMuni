@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">Cadena de Valor</div>
                            <a href="{{route('areas.create')}}" class="ml-1 btn waves-effect waves-light tooltipped red" data-position="bottom" data-tooltip="Nueva área">
                                <div class="eva eva-plus"></div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($areas) > 0)
                        <div class="col m12 mb-1">
                            <a href="{{route('actividades.create')}} " class="btn btn-small waves-effect waves-light">Nueva actividad</a>
                        </div> 
                        <br>
                            @foreach ($areas as $area)
                            <div class="col m12">
                                <div class="row ">
                                    <div class="col m9 indigo lighten-2">  
                                        <h6 class="text-white">{{ $area->titulo }}</h6>
                                    </div>
                                    <div class="col m3 d-flex">                                    
                                        <a href="{{route('areas.edit',$area->id)}} " class="btn btn-small waves-effect waves-light green">
                                            Modificar
                                        </a>
                                        <form action="{{route('areas.destroy',$area->id)}}" method="post">
                                            @csrf    
                                            @method('delete')
                                            <button type="submit" class="ml-1 btn btn-small waves-effect waves-light red lighten-1">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div> 
                                    
                                </div>
                                @forelse ($area->actividades as $actividad)
                                    <div class="row" id="fila{{$actividad->id}}">
                                       
                                        <div class="col m9">
                                            <p>{{$actividad->titulo}}</p>
                                        </div>
                                        <div class="col m3 d-flex">                                    
                                            <a href="{{route('actividades.edit',$actividad->id)}} " class="btn btn-small waves-effect waves-light primary">
                                                Modificar
                                            </a>
                                            <form action="{{route('actividades.destroy',$actividad->id)}}" method="post">
                                                @csrf    
                                                @method('delete')
                                                <button type="submit" class="ml-1 btn btn-small waves-effect waves-light red">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>  
                                        
                                    </div>
                                @empty
                                    <div class="row">
                                        
                                        <div class="col m12">
                                            <p>No tiene actividades...</p>
                                        </div>
                                        
                                    </div>
                                @endforelse
                                
                            </div>
                            @endforeach
                            <div class="w-100 center-align">
                                {{ $areas->links() }}
                            </div>
                        @else
                            <h4 class="text-bold">No hay ningún registro!!!</h4>
                        @endif
                </div>
            </div>
            
        </div>        
    </div>
@endsection