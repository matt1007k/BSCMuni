@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Estrategias de Matriz FODA</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('fce.cm') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        FCE vs CM
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('proposiciones.index') }}">
                        Proposición de valor
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link @if($tipo == 'FO') active @endif"
                                href="{{url('/foda?tipo=FO')}}">Estrategias FO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($tipo == 'FA') active @endif"
                                href="{{url('/foda?tipo=FA')}}">Estrategias FA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($tipo == 'DO') active @endif"
                                href="{{url('/foda?tipo=DO')}}">Estrategias DO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($tipo == 'DA') active @endif"
                                href="{{url('/foda?tipo=DA')}}">Estrategias DA</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    @if ($tipo === 'FO')
                    @include('admin.estrategias.estrategiasFO', [
                    'fortalezas' => $fortalezas,
                    'oportunidades' => $oportunidades,
                    'estrategias' => $estrategias
                    ])
                    @elseif($tipo === 'FA')
                    @include('admin.estrategias.estrategiasFA', [
                    'fortalezas' => $fortalezas,
                    'oportunidades' => $oportunidades,
                    'estrategias' => $estrategias
                    ])
                    @elseif($tipo === 'DO')
                    @include('admin.estrategias.estrategiasDO', [
                    'fortalezas' => $fortalezas,
                    'oportunidades' => $oportunidades,
                    'estrategias' => $estrategias
                    ])
                    @elseif($tipo === 'DA')
                    @include('admin.estrategias.estrategiasDA', [
                    'fortalezas' => $fortalezas,
                    'oportunidades' => $oportunidades,
                    'estrategias' => $estrategias
                    ])
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection