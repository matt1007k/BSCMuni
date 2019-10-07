@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">                     
                <div class="row">
                    <div class="col-md-12 d-flex flex-column justify-content-center">
                        <h3 class="text-center">Matriz FODA</h3>
                    </div>
                </div>
                <div class="w-100 text-center">
                    <div class="ml-3 padding-ultra-small">
                        <div class="btn-group" role="group" aria-label="Filtro estrategia">
                            <a href="{{url('/foda?tipo=FO')}}" class="btn btn-info @if($tipo == 'FO') active @endif">Estrategias FO</a>
                            <a href="{{url('/foda?tipo=FA')}}" class="btn btn-info @if($tipo == 'FA') active @endif">Estrategias FA</a>
                            <a href="{{url('/foda?tipo=DO')}}" class="btn btn-info @if($tipo == 'DO') active @endif">Estrategias DO</a>
                            <a href="{{url('/foda?tipo=DA')}}" class="btn btn-info @if($tipo == 'DA') active @endif">Estrategias DA</a>
                        </div>                        
                    </div>
                </div>
                <div class="card">
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