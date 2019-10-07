@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-3">
        <div class="col-md">
            <div class="h3 text-center">
                Las 5 fuerzas de porter
            </div>
        </div>
    </div>          
    <div class="row">
        @if (count($fuerzas) > 0)
            @foreach ($fuerzas as $fuerza)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="h5">{{ $fuerza->titulo }}</div>
                    </div>
                    <div class="card-body">
                        @forelse ($fuerza->factores as $factor)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>- {{$factor->titulo}}</p>
                                </li>
                            </ul>
                        @empty
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <p>No tiene factores...</p>
                                </div>
                                
                            </div>
                        @endforelse
                    </div>
                </div>
                
               
                
            </div>
            @endforeach
            <div class="w-100 text-center">
                {{ $fuerzas->links() }}
            </div>
        @else
            <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>
@endsection