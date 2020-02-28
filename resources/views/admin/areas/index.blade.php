@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Cadena de valor</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('procesos.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Macroproceso
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('fuerzas.index') }}">
                        Las 5 Fuerzas de Porter
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

    <a href="{{route('areas.create')}}" class="btn btn-success mb-3">
        Registrar área
    </a>
    <div class="">
        @if (count($areas) > 0)
        @foreach ($areas as $area)
        <div class="card mb-3">
            <div class="p-3 d-flex justify-content-between align-items-center">

                <h6 class="h4 font-weight-bold text-dark">{{ $area->titulo }}</h6>
                <div class="d-flex align-items-center">
                    <a href="{{route('areas.activities.create', $area)}} " class="btn btn-success mr-1">
                        Registrar actividad
                    </a>
                    <a href="{{route('areas.edit', $area->id)}} " class="btn btn-rounded btn-icons btn-info btn-sm"
                        data-toggle="tooltip" data-placement="top" title="Editar registro">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <form action="{{route('areas.destroy',$area->id)}}" method="post">
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
                    @forelse ($area->actividades as $actividad)
                    <li class="p-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="m-0">{{$actividad->titulo}}</p>
                            <div class="d-flex align-items-center">
                                <a href="{{route('areas.activities.edit',[$area, $actividad->id])}}"
                                    class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="Editar registro">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form action="{{route('areas.activities.destroy',[$area, $actividad->id])}}"
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
                        <p class="no-margin">No tiene actividades.</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>



        @endforeach
        <div class="w-100 d-flex justify-content-center">
            {{ $areas->links() }}
        </div>
        @else
        <h4 class="w-100 d-flex justify-content-center text-bold">No hay ningún registro!!!</h4>
        @endif
    </div>
</div>
@endsection