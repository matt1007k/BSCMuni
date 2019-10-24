@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h3>Resumen</h3>
            <p>Resumen del BSC por objetivos a lograr</p>
        </div>
    </div>
    <div class="card border-dark mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                    <li class="nav-item">
                        <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif" href="{{url('/resumen?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
                    </li>
                @empty
                    <li>No hay perspectiva</li>
                @endforelse
                
            </ul>
        </div>
        <div class="card-body">

            @if(count($perspectivas) > 0)
                @if ($perspectivaObjetivos->slug === 'FI')
                @include('paginas.maestro.perspectivaObjetivosResumen', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
                ])
                @elseif ($perspectivaObjetivos->slug === 'CL')
                @include('paginas.maestro.perspectivaObjetivosResumen', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'PR')
                @include('paginas.maestro.perspectivaObjetivosResumen', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'AP')
                @include('paginas.maestro.perspectivaObjetivosResumen', [
                'perspectivaObjetivos' => $perspectivaObjetivos,
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