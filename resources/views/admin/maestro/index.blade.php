@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Maestro</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('datos.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Datos
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('maestro.resumen') }}">
                        Resumen
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
    <div class="w-100 pr-4 mb-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalFiltrar">
            Comparar
        </button>

        @include('admin.maestro._modalFiltrar')
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                <li class="nav-item">
                    <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif"
                        href="{{url('/perspectivas-maestro?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
                </li>
                @empty
                <li>No hay perspectiva</li>
                @endforelse

            </ul>
        </div>
        <div class="card-body">
            @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])
            @else
            <div>No existe esta perspectiva.</div>
            @endif

            @else
            <div>No hay perspectivas registradas.</div>
            @endif
        </div>
    </div>

</div>


@endsection