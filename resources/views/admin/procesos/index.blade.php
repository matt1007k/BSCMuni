@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">
                                Macroproceso: 
                                @isset($informacion->macroproceso)
                                    {{$informacion->macroproceso}}
                                @else
                                    Sin macroproceso....
                                @endisset
                                
                            </div>
                            <a href="{{route('procesos.create')}}" class="ml-1 btn waves-effect waves-light tooltipped red" 
                                data-position="bottom" data-tooltip="Nueva proceso">
                                <div class="eva eva-plus"></div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($procesos) > 0)
                        <div class="col m12 mb-1">
                            <a href="{{route('subprocesos.create')}} " class="btn btn-small waves-effect waves-light">Nueva subproceso</a>
                        </div> 
                        <br>
                            @foreach ($procesos as $proceso)
                            <div class="col m12">
                                <div class="row ">
                                    <div class="col m9 indigo lighten-2">  
                                        <h6 class="text-white">{{ $proceso->titulo }}</h6>
                                    </div>
                                    <div class="col m3 d-flex">                                    
                                        <a href="{{route('procesos.edit',$proceso->id)}} " class="btn btn-small waves-effect waves-light green">
                                            Modificar
                                        </a>
                                        <form action="{{route('procesos.destroy',$proceso->id)}}" method="post">
                                            @csrf    
                                            @method('delete')
                                            <button type="submit" class="ml-1 btn btn-small waves-effect waves-light red lighten-1">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div> 
                                    
                                </div>
                                @forelse ($proceso->subprocesos as $subproceso)
                                    <div class="row" id="fila{{$subproceso->id}}">
                                       
                                        <div class="col m9">
                                            <p>{{$subproceso->titulo}}</p>
                                        </div>
                                        <div class="col m3 d-flex">                                    
                                            <a href="{{route('subprocesos.edit',$subproceso->id)}} " class="btn btn-small waves-effect waves-light primary">
                                                Modificar
                                            </a>
                                            <form action="{{route('subprocesos.destroy',$subproceso->id)}}" method="post">
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
                                            <p>No tiene subprocesos...</p>
                                        </div>
                                        
                                    </div>
                                @endforelse
                                
                            </div>
                            @endforeach
                            <div class="w-100 center-align">
                                {{ $procesos->links() }}
                            </div>
                        @else
                            <h4 class="text-bold">No hay ningún registro!!!</h4>
                        @endif
                </div>
            </div>
            
        </div>        
    </div>
@endsection