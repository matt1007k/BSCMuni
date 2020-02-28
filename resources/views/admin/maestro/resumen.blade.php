@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Resumen</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('maestro.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Maestro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="">

    <div class="card mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @forelse ($perspectivas as $perspectiva)
                <li class="nav-item">
                    <a class="nav-link @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif"
                        href="{{url('/perspectivas-resumen?perspectiva='.$perspectiva->slug)}}">{{$perspectiva->titulo}}</a>
                </li>
                @empty
                <li>No hay perspectiva</li>
                @endforelse

            </ul>
        </div>
        <div class="card-body">

            @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('admin.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('admin.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('admin.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('admin.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])
            @else
            <div class="font-italic h4 font-weight-bold p-3 bg-secondary">No existe esta perspectiva.</div>

            @endif

            @else
            <div class="font-italic h4 font-weight-bold p-3 bg-secondary">No hay perspectivas registradas.</div>

            @endif
        </div>
    </div>
</div>
@endsection