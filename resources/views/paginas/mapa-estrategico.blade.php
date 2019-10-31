@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-title h3">Mapa Estratégico</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($perspectivas) > 0)
                        @foreach ($perspectivas as $perspectiva)
                        <div class="col-md-12 col-sm-12">
                            <div class="card bg-dark mb-2">
                                <div class="card-body text-white">
                                    <span class="card-title">{{$perspectiva->titulo}}</span>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($perspectiva->objetivos as $objetivo)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="card bg-primary mb-2 mt-2">
                                        <div class="card-body text-white">
                                            <span class="title">{{$objetivo->slug}} - {{$objetivo->contenido}}</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-sm-12">
                                    <p>No tiene objetivos...</p>
                                </div>
                                @endforelse
                            </div>
                        </div>

                        @endforeach

                        @else
                        <h4 class="text-bold">No hay ningún registro!!!</h4>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection