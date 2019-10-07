@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-3">
        <div class="col-md">
            <div class="h3 text-center">
                Cadena de valor
            </div>
        </div>
    </div>          
    <div class="row">
        @if (count($areas) > 0)
            @foreach ($areas as $area)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> 
                        <div class="h5">{{ $area->titulo }}</div>
                    </div>
                    <div class="card-body">
                        @forelse ($area->actividades as $actividad)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>- {{$actividad->titulo}}</p>
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