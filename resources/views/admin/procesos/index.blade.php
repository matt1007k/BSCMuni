@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">Macroproceso @isset($informacion->macroproceso)
            {{$informacion->macroproceso}}
            @else
            Sin macroproceso....
            @endisset</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('informaciones.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Información de la empresa
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('areas.index') }}">
                        Cadena de Valor
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

    <a href="{{route('procesos.create')}}" class="btn btn-success mb-3">
        Registrar proceso
    </a>
    <div class="">
        @if (count($procesos) > 0)
        @foreach ($procesos as $proceso)
        <div class="card mb-3">
            <div class="p-3 d-flex justify-content-between align-items-center">

                <h6 class="h4 font-weight-bold text-dark">{{ $proceso->titulo }}</h6>
                <div class="d-flex align-items-center">
                    <a href="{{route('procesos.subprocesos.create', $proceso)}} " class="btn btn-success mr-1">
                        Registrar subproceso
                    </a>
                    <a href="{{route('procesos.edit', $proceso)}} " class="btn btn-rounded btn-icons btn-info btn-sm"
                        data-toggle="tooltip" data-placement="top" title="Editar registro">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <form action="{{route('procesos.destroy',$proceso)}}" method="post">
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
                    @forelse ($proceso->subprocesos as $subproceso)
                    <li class="p-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="m-0">{{$subproceso->titulo}}</p>
                            <div class="d-flex align-items-center">
                                <a href="{{route('procesos.subprocesos.edit',[$proceso, $subproceso])}}"
                                    class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="Editar registro">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form action="{{route('procesos.subprocesos.destroy',[$proceso, $subproceso])}}"
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
                        <p class="no-margin">No tiene subprocesoes.</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>



        @endforeach
    </div>
    <div class="w-100 d-flex justify-content-center">
        {{ $procesos->links() }}
    </div>
    @else
    <h4 class="w-100 d-flex justify-content-center text-bold">No hay ningún registro!!!</h4>
    @endif
</div>
@endsection