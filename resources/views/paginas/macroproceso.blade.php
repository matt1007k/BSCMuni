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
                                {{$informacion->macroproceso}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($procesos) > 0)
                        <br>
                            @foreach ($procesos as $proceso)
                            <div class="col m3">
                                <div class="row ">
                                    <div class="col m12 indigo lighten-2">  
                                        <h6 class="text-white">{{ $proceso->titulo }}</h6>
                                    </div>
                                    
                                </div>
                                @forelse ($proceso->subprocesos as $subproceso)
                                    <div class="row" id="fila{{$subproceso->id}}">
                                       
                                        <div class="col m12">
                                            <p>{{$subproceso->titulo}}</p>
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