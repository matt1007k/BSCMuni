@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="h3 text-center">Visión en Acción</div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="text-white font-weight-bold" style="background-color:#5bbbc9">
                                    <td>MISIÓN</td>
                                </tr>
                                <tr class="text-white" style="background-color:#5bbbc9">
                                    <td>{{ $informacion->mision }}</td>
                                </tr>

                                <tr class="text-white font-weight-bold" style="background-color:#e05e58">
                                    <td>VISIÓN</td>
                                </tr>
                                <tr class="text-white" style="background-color:#e05e58">
                                    <td>{{ $informacion->vision }}</td>
                                </tr>
                                <tr class="font-weight-bold">
                                    <td>ESTRATEGIAS</td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="list-unstyled">
                                            @forelse ($estrategias as $key => $value)
                                            <li class="pl-1">{{$key + 1}}. {{$value['contenido']}}</li>
                                            @empty
                                            <li>No tienes estrategias</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <table class="table table-bordered">
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
                                    <td colspan="{{$perspectivas->count()}}">Objetivos</td>
                                </tr>
                                <tr>
                                    @forelse($perspectivas as $perspectiva)
                                    <td>
                                        <ul class="list-unstyled">
                                            @forelse ($perspectiva->objetivos as $objetivo)
                                            <li class="pb-2 pt-2 pl-1 d-flex"><span class="pr-2">√</span>
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