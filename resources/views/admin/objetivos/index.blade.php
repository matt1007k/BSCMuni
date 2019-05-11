@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="card">
            <div class="card-content ">
                <div class="row">
                    <div class="col m12 d-flex justify-center">
                        <div class="card-title">Objetivos Estrategicos</div>
                        <a href="{{route('perspectivas.create')}}"
                            class="ml-1 btn waves-effect waves-light tooltipped red" data-position="bottom"
                            data-tooltip="Nueva área">
                            <div class="eva eva-plus"></div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    @if (count($perspectivas) > 0)
                    <div class="col m12 mb-1">
                        <a href="{{route('objetivos.create')}} " class="btn btn-small waves-effect waves-light">Nuevo
                            objetivo</a>
                    </div>
                    <br>
                    @foreach ($perspectivas as $perspectiva)
                    <div class="col m12">
                        <div class="row ">
                            <div class="col m9 indigo lighten-2">
                                <h6 class="text-white">{{ $perspectiva->titulo }}</h6>
                            </div>
                            <div class="col m3 d-flex">
                                <a href="{{route('perspectivas.edit',$perspectiva->id)}} "
                                    class="btn btn-small waves-effect waves-light green">
                                    Modificar
                                </a>
                                <form action="{{route('perspectivas.destroy',$perspectiva->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="ml-1 btn btn-small waves-effect waves-light red lighten-1">
                                        Eliminar
                                    </button>
                                </form>
                            </div>

                        </div>
                        @forelse ($perspectiva->objetivos as $objetivo)
                        <div class="row">
                            <div class="col m1">
                                <p class="no-margin">{{$objetivo->slug}}</p>
                            </div>

                            <div class="col m7">
                                <p>{{$objetivo->contenido}}</p>
                            </div>
                            <div class="col m4 d-flex justify-content-between">
                                <a href="{{route('asignarEstrategia',$objetivo->id)}} "
                                    class="btn btn-small waves-effect waves-light teal">
                                    Asignar estrategia
                                </a>
                                <a href="{{route('objetivos.edit',$objetivo->id)}} "
                                    class="btn btn-small waves-effect waves-light primary">
                                    Modificar
                                </a>
                                <form action="{{route('objetivos.destroy',$objetivo->id)}}" method="post">
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
                                <p>No tiene objetivos...</p>
                            </div>

                        </div>
                        @endforelse

                    </div>
                    @endforeach
                    <div class="w-100 center-align">
                        {{ $perspectivas->links() }}
                    </div>
                    @else
                    <h4 class="text-bold">No hay ningún registro!!!</h4>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @endsection