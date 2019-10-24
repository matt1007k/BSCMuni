@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">                     
                <div class="w-100 mb-4">
                    <div class="pl-2">
                        <h3 class="">Matriz FODA</h3>
                        <p>Las extragias para afrontar los factores externos y factores internos.</p>
                    </div>
                </div>
              
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link @if($tipo == 'FO') active @endif" href="{{url('/matriz-foda?tipo=FO')}}">Estrategias FO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($tipo == 'FA') active @endif" href="{{url('/matriz-foda?tipo=FA')}}">Estrategias FA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($tipo == 'DO') active @endif" href="{{url('/matriz-foda?tipo=DO')}}">Estrategias DO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($tipo == 'DA') active @endif" href="{{url('/matriz-foda?tipo=DA')}}">Estrategias DA</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">

                        @if ($tipo === 'FO')
                            @include('paginas.estrategias.estrategiasFO', [
                                'fortalezas' => $fortalezas,
                                'oportunidades' => $oportunidades,
                                'estrategias' => $estrategias
                            ])
                        @elseif($tipo === 'FA')
                            @include('paginas.estrategias.estrategiasFA', [
                                'fortalezas' => $fortalezas,
                                'oportunidades' => $oportunidades,
                                'estrategias' => $estrategias
                            ])
                        @elseif($tipo === 'DO')
                            @include('paginas.estrategias.estrategiasDO', [
                                'fortalezas' => $fortalezas,
                                'oportunidades' => $oportunidades,
                                'estrategias' => $estrategias
                            ])
                        @elseif($tipo === 'DA')
                            @include('paginas.estrategias.estrategiasDA', [
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