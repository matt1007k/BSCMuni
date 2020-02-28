@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">
            Visión en Acción
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('proposiciones.index') }}">
                        Proposición de Valor para el Cliente
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('perspectivas.index') }}">
                        Objetivos Estratégicos
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        MISIÓN
                    </div>
                    <div class="card-content font-italic bg-secondary px-3 py-4">{{ $informacion->mision }}</div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        VISIÓN
                    </div>
                    <div class="card-content font-italic bg-secondary px-3 py-4">{{ $informacion->vision }}</div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        ESTRATEGIAS
                    </div>
                    <div class="card-content font-italic bg-secondary px-3 py-4">
                        <ul class="list-unstyled">
                            @forelse ($estrategias as $key => $value)
                            <li class="pl-1">{{$key + 1}}. {{$value['contenido']}}</li>
                            @empty
                            <li>No tienes estrategias</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row mt-2 mb-4">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th colspan="4" class="h4">Perspectivas</th>
                                </tr>
                                <tr>
                                    @forelse($perspectivas as $perspectiva )
                                    <th>{{$perspectiva->titulo}}</th>
                                    @empty
                                    <th colspan="4" class="text-bold">No hay ningún registro!!!</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="h4">
                                    <td colspan="{{$perspectivas->count()}}" class="h4 text-uppercase text-dark">
                                        Objetivos</td>
                                </tr>
                                <tr>
                                    @forelse($perspectivas as $perspectiva)
                                    <td>
                                        <ul class="list-unstyled">
                                            @forelse ($perspectiva->objetivos as $objetivo)
                                            <li class="pb-2 pt-2 pl-1 d-flex">
                                                <i class="mdi mdi-arrow-right mr-2 text-info"></i>
                                                <span>
                                                    {{$objetivo->contenido}}.
                                                    <span class="text-primary">
                                                        @if ($objetivo->estrategias->count() > 1)
                                                        ( Estrategias
                                                        {{ $objetivo->getIdsEstrategias()->implode(", ") }}
                                                        )
                                                        @elseif($objetivo->estrategias->count() == 1)
                                                        ( Estrategia
                                                        {{ $objetivo->getIdsEstrategias()->implode(", ") }}
                                                        )
                                                        @endif
                                                    </span>

                                                </span>
                                            </li>
                                            @empty
                                            <li>No tienes objetivos</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                    @empty
                                    <td colspan="4" class="text-bold">No hay ningún registro!!!</td>
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection