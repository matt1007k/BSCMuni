<div class="row">
    <div class="col m12">
        <h3 class="bg-info text-white text-center p-2">{{$perspectivaObjetivos->titulo}}</h3>        
        <table class="table table-dark table-striped">
            <thead>
                <th>Objetivos</th>
                <th>Indicador</th>
                <th>Meta</th>
                <th class="text-center">Actual</th>
                <th class="text-center">Semáforo</th>
            </thead>
            <tbody>
                @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                <tr>                                      
                    <td>{{$objetivo->contenido}}</td>
                    @forelse ($objetivo->indicadores as $indicador)
                    <tr>
                        <td></td>
                        <td>{{$indicador->indicador}}</td>
                        <td>{{$indicador->meta}}</td>

                    @if (count($indicador->datos)) 
                        
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                {{$indicador->datos->last()->total }}
                            @else
                                {{ number_format($indicador->datos->last()->porcentaje, 0) }}%
                            @endif
                        </td>  
                        
                    @else                                       
                        <td>No exite el año</td>  
                    @endif
                    
                    @if (count($indicador->datos)) 
                        
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                @if ($indicador->datos->last()->total >= $indicador->meta) 
                                    <div class="text-success">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->total < $indicador->meta && $indicador->datos->last()->total >= (int)substr($indicador->rojo, -2))
                                    <div class="text-warning">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->total < (int)substr($indicador->rojo, -2))
                                    <div class="text-danger">
                                        O
                                    </div>
                                @endif
                            @elseif ($indicador->tipo == "reducir") 

                                @if ($indicador->datos->last()->porcentaje <= $indicador->meta)
                                    <div class="text-success">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje > $indicador->meta && $indicador->datos->last()->porcentaje <= (int)substr($indicador->rojo, -2)) 
                                    <div class="text-warning">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje > (int)substr($indicador->rojo, -2)) 
                                    <div class="text-danger">
                                        O
                                    </div>
                                @endif
                            @else
                                @if ($indicador->datos->last()->porcentaje >= $indicador->meta) 
                                    <div class="text-success">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje < $indicador->meta && $indicador->datos->last()->porcentaje >= (int)substr($indicador->rojo, -2))
                                    <div class="text-warning">
                                        O
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje < (int)substr($indicador->rojo, -2)) 
                                    <div class="text-danger">
                                        O
                                    </div>
                                @endif
                            @endif
                        </td>
                        
                    @else
                        <td>No exite el año</td>  
                    @endif
                        
                    
                    </tr>
                    @empty
                    <tr>
                        <td></td>
                        <td colspan="10">
                            Este objetivo no tiene indicador.
                        </td>
                    </tr>
                @endforelse
                </tr>
                @empty
                <tr>
                    <td colspan="10">
                        Esta perspectiva no tiene objetivos.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>            
    <div class="w-100 p-3">
        <table class="table table-dark table-striped">
            <thead>
                <th>Indicadores</th>
                <th class="text-center text-white text-success"> Verde </th> 
                <th class="text-center text-white text-warning"> Amarillo </th> 
                <th class="text-center text-white text-danger"> Rojo </th>
            </thead>
            <tbody>
                @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                    @forelse ($objetivo->indicadores as $indicador)
                    <tr>
                        <td>{{$indicador->indicador}}</td>
                        <td class="text-center">{{$indicador->verde}}</td>
                        <td class="text-center">{{$indicador->amarillo}}</td>
                        <td class="text-center">{{$indicador->rojo}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">Este objetivo no tiene indicadores</td>
                        </tr>
                    @endforelse
                    
                @empty
                    <tr>
                        <td colspan="">Esta perspectiva no tiene objetivos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>          
    </div>
</div>