@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Lista de datos según perspectiva</h3>
        </div>
    </div>
    
    <div class="card border-dark mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                    <li class="nav-item">
                        <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif" href="{{url('/objetivos/datos?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
                    </li>
                @empty
                    <li>No hay perspectiva</li>
                @endforelse
                
            </ul>
        </div>
        <div class="card-body">
            @if(count($perspectivas) > 0)
                @if ($perspectivaObjetivos->slug === 'FI')
                @include('paginas.datos.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
                @elseif ($perspectivaObjetivos->slug === 'CL')
                @include('paginas.datos.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'PR')
                @include('paginas.datos.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'AP')
                @include('paginas.datos.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
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