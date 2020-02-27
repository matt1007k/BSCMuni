@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Lista de datos</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('indicadores.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Indicadores
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('maestro.index') }}">
                        Maestro
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
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                <li class="nav-item">
                    <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif"
                        href="{{url('/datos?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
                </li>
                @empty
                <li>No hay perspectiva</li>
                @endforelse

            </ul>
        </div>
        <div class="card-body">
            @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('admin.datos.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('admin.datos.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('admin.datos.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('admin.datos.perspectivaObjetivos', [
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