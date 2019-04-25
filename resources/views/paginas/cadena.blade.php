@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">Cadena de Valor</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($areas) > 0)
                        <br>
                            @foreach ($areas as $area)
                            <div class="col m12">
                                <div class="row ">
                                    <div class="col m12 indigo lighten-2">  
                                        <h6 class="text-white">{{ $area->titulo }}</h6>
                                    </div>
                                    <div class="col m3 d-flex">  
                                    </div> 
                                    
                                </div>
                                @forelse ($area->actividades as $actividad)
                                    <div class="row" id="fila{{$actividad->id}}">
                                       
                                        <div class="col m12">
                                            <p>{{$actividad->titulo}}</p>
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