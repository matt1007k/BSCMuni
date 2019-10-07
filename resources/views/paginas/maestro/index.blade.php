@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 d-flex justify-center align-items-center">
            <h3>Maestro</h3>
        </div>
    </div>
    <div class="w-100 pl-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFiltrar">
            Filtrar por valor
        </button>

        @include('paginas.maestro._modalFiltrar')
    </div>
    <div class="w-100 text-center">
        <div class="ml-3 padding-ultra-small">
            <div class="btn-group" role="group" aria-label="Filtro perspectivas">
                @forelse ($perspectivas as $perspectiva)
                    <a href="{{url('/maestro?perspectiva='.$perspectiva->slug)}}" class="btn btn-info @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif">{{$perspectiva->titulo}}</a>
                @empty
                    <option value="">No hay perspectiva</option>
                @endforelse
            </div>                        
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if(count($perspectivas) > 0)
                @if ($perspectivaObjetivos->slug === 'FI')
                @include('paginas.maestro.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
                'anio_anterior' => $anio_anterior,
                'anio_actual' => $anio_actual,
                'semaforo' => $semaforo,
                ])
                @elseif ($perspectivaObjetivos->slug === 'CL')
                @include('paginas.maestro.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
                'anio_anterior' => $anio_anterior,
                'anio_actual' => $anio_actual,
                'semaforo' => $semaforo,
                ])
        
                @elseif ($perspectivaObjetivos->slug === 'PR')
                @include('paginas.maestro.perspectivaObjetivos', [
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