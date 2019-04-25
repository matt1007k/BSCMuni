@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">                     
            <div class="row">
                <div class="col m12 d-flex justify-center align-items-center">
                    <h5>Matriz FODA</h5>
                    <div class="ml-3 padding-ultra-small">
                        <form action="{{route('paginas.matrizFODA')}}" method="get">                                
                            <div class="row d-flex align-items-center">
                                <div class="input-field col m8">                                
                                    <select name="tipo" id="tipo">                                                                    
                                        <option value="FO" {{$tipo === 'FO' ? 'selected' : ''}}>Estrategias FO</option>
                                        <option value="FA" {{$tipo === 'FA' ? 'selected' : ''}}>Estrategias FA</option>
                                        <option value="DO" {{$tipo === 'DO' ? 'selected' : ''}}>Estrategias DO</option>
                                        <option value="DA" {{$tipo === 'DA' ? 'selected' : ''}}>Estrategias DA</option>
                                    </select for="tipo">
                                    <label>Seleccione la estrategia</label>                                
                                </div>
                                <div class="col m3">
                                    <button class="btn" type="submit">Filtar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
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
@endsection