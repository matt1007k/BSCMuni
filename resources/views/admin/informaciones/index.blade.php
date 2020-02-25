@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Información de la organización</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            {{-- <ul class="quick-links">
                <li>
                    <a href="{{ route('informaciones.index') }}">
            <i class="mdi mdi-arrow-left"></i>
            Informaciones
            </a>
            </li>
            </ul> --}}
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('procesos.index') }}">
                        Macro Proceso
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
        <div class="col-md">
            <div class="row mb-2 d-flex">
                @if ($informaciones->count() < 1) <a href="{{route('informaciones.create')}}"
                    class="ml-2 btn btn-success">
                    Agregar información de la empresa
                    </a>
                    @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid w-100 rounded-lg" style="height:350px"
                        src="{{ asset('images/business.png') }}" alt="profile image">
                    @forelse ($informaciones as $informacion)
                    <div class="px-4">
                        <div class="d-flex justify-content-between pt-4">
                            <div class="wrapper">
                                <h5 class="font-weight-medium mb-0 ellipsis">{{ $informacion->nombre }}</h5>
                                <p class="mb-0 text-muted ellipsis"></p>
                            </div>
                            <div>
                                <a href="{{ route('informaciones.edit', $informacion->id) }}"
                                    class="btn btn-outline-info rounded-lg">
                                    <i class="mdi mdi-pencil"></i> Editar
                                </a>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="d-flex align-items-center py-1">
                                <i class="mdi mdi-sitemap mdi-36px mr-2"></i>
                                <span class="mr-2">Macroproceso: </span>
                                <p class="mb-0 font-italic font-weight-bold">"{{ $informacion->macroproceso }}"</p>
                            </div>
                            <div class="d-flex align-items-center py-1">
                                <i class="mdi mdi-eye mdi-36px mr-2"></i>
                                <span class="mr-2">Visión: </span>
                                <p class="mb-0 font-italic">"{{ $informacion->vision }}"</p>
                            </div>
                            <div class="d-flex align-items-center py-1">
                                <i class="mdi mdi-greater-than mdi-36px mr-2">
                                </i><span class="mr-2">Misión: </span>
                                <p class="mb-0 font-italic">"{{ $informacion->mision }}"</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="h3">No hay ningún registro!!!</div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
    @endsection