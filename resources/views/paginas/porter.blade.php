@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">5 Fuerzas de Porter</div>
                        
                        </div>
                    </div>
                    <div class="row">
                        @if (count($fuerzas) > 0)
                        <br>
                            @foreach ($fuerzas as $fuerza)
                            <div class="col m12">
                                <div class="row ">
                                    <div class="col m12 indigo lighten-2">  
                                        <h6 class="text-white">{{ $fuerza->titulo }}</h6>
                                    </div>
                                    
                                </div>
                                @forelse ($fuerza->factores as $factor)
                                    <div class="row" id="fila{{$factor->id}}">
                                       
                                        <div class="col m12">
                                            <p>{{$factor->titulo}}</p>
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