@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Maestro</h3>
            <p>Filtrar para comparar si se cumplieron los objetivos</p>
        </div>
    </div>
    <div class="w-100 pr-4 mb-2 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary text-uppercase" data-toggle="modal" data-target="#modalFiltrar">
            Filtrar
        </button>

        @include('admin.maestro._modalFiltrar')
    </div>
    <div class="card border-dark mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                    <li class="nav-item">
                        <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif" href="{{url('/perspectivas-maestro?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
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