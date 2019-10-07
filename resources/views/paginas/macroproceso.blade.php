@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-3">
        <div class="col-md">
            <div class="h3 text-center">
                Macroproceso: 
                @isset($informacion->macroproceso)
                    {{$informacion->macroproceso}}
                @else
                    Sin macroproceso....
                @endisset
                
            </div>  
        </div>
    </div>          
    <div class="row">
        @if (count($procesos) > 0)
            @foreach ($procesos as $proceso)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> 
                        <h6 class="h5">Proceso: {{ $proceso->titulo }}</h6>
                    </div>
                    <div class="card-body">
                        @forelse ($proceso->subprocesos as $subproceso)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>- {{$subproceso->titulo}}</p>                                        
                                </li>
                            </ul>
                        @empty
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <p>No tiene subprocesos...</p>
                                </div>
                                
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @endforeach
            <div class="w-100 text-center">
                {{ $procesos->links() }}
            </div>
        @else
            <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>  
@endsection