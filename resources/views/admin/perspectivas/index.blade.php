@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">
            Los Ojetivos Estratégicos
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('objetivos.accion') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Visión en Acción
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('mapas.index') }}">
                        Mapa Estratégico
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

    <a href="{{route('perspectivas.create')}}" class="btn btn-success mb-3">
        Registrar perspectiva
    </a>
    <div class="">
        @if (count($perspectivas) > 0)
        @foreach ($perspectivas as $perspectiva)
        <div class="card mb-3">
            <div class="p-3 d-flex justify-content-between align-items-center">

                <h6 class="h4 font-weight-bold text-dark">{{ $perspectiva->titulo }}</h6>
                <div class="d-flex align-items-center">
                    <a href="{{route('perspectivas.objetivos.create', $perspectiva)}} " class="btn btn-success mr-1">
                        Registrar objetivo
                    </a>
                    <a href="{{route('perspectivas.edit', $perspectiva->id)}} "
                        class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Editar registro">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <form action="{{route('perspectivas.destroy',$perspectiva->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="ml-1 btn btn-rounded btn-icons btn-danger btn-sm"
                            data-toggle="tooltip" data-placement="top" title="Eliminar registro">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body py-3">
                <ul class="m-0">
                    @forelse ($perspectiva->objetivos as $objetivo)
                    <li class="p-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="m-0">{{$objetivo->contenido}}</p>
                            <div class="d-flex align-items-center">
                                <a href="{{route('perspectivas.objetivos.edit',[$perspectiva, $objetivo->id])}}"
                                    class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="Editar registro">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form action="{{route('perspectivas.objetivos.destroy',[$perspectiva, $objetivo->id])}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-rounded btn-icons btn-danger btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Eliminar registro">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </li>
                    @empty
                    <li>
                        <p class="no-margin">No tiene objetivoes.</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>



        @endforeach
        <div class="w-100 d-flex justify-content-center">
            {{ $perspectivas->links() }}
        </div>
        @else
        <h4 class="w-100 d-flex justify-content-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>
@endsection