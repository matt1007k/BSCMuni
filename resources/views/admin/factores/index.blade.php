@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">5 Fuerzas de Porter</div>
                            <a href="{{route('fuerzas.create')}}" class="ml-1 btn waves-effect waves-light tooltipped red" data-position="bottom" data-tooltip="Nueva fuerza">
                                <div class="eva eva-plus"></div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($fuerzas) > 0)
                        <div class="col m12 mb-1">
                            <a href="{{route('factores.create')}} " class="btn btn-small waves-effect waves-light">Nuevo factor</a>
                        </div> 
                        <br>
                            @foreach ($fuerzas as $fuerza)
                            <div class="col m12">
                                <div class="row ">
                                    <div class="col m9 indigo lighten-2">  
                                        <h6 class="text-white">{{ $fuerza->titulo }}</h6>
                                    </div>
                                    <div class="col m3 d-flex">                                    
                                        <a href="{{route('fuerzas.edit',$fuerza->id)}} " class="btn btn-small waves-effect waves-light green">
                                            Modificar
                                        </a>
                                        <form action="{{route('fuerzas.destroy',$fuerza->id)}}" method="post">
                                            @csrf    
                                            @method('delete')
                                            <button type="submit" class="ml-1 btn btn-small waves-effect waves-light red lighten-1">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div> 
                                    
                                </div>
                                @forelse ($fuerza->factores as $factor)
                                    <div class="row" id="fila{{$factor->id}}">
                                       
                                        <div class="col m9">
                                            <p>{{$factor->titulo}}</p>
                                        </div>
                                        <div class="col m3 d-flex">                                    
                                            <a href="{{route('factores.edit',$factor->id)}} " class="btn btn-small waves-effect waves-light primary">
                                                Modificar
                                            </a>
                                            <form action="{{route('factores.destroy',$factor->id)}}" method="post">
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
                                            <p>No tiene factores...</p>
                                        </div>
                                        
                                    </div>
                                @endforelse
                                
                            </div>
                            @endforeach
                            <div class="w-100 center-align">
                                {{ $fuerzas->links() }}
                            </div>
                        @else
                            <h4 class="text-bold">No hay ningún registro!!!</h4>
                        @endif
                </div>
            </div>
            
        </div>        
    </div>
@endsection