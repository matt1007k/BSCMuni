<div class="row">
    <div class="col m12">
        <h3 class="bg-dark text-white text-center p-2">{{$perspectivaObjetivos->titulo}}</h3>        
        <table class="table table-bordered">
            <thead  class="text-center">
                <th>Objetivos</th>
                <th>Indicador</th>
                <th>Meta</th>
                <th>Actual</th>
                <th>Semáforo</th>
            </thead>
            <tbody>
                @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                <tr>                                      
                    <td rowspan="{{$objetivo->indicadores->count() + 1}}">{{$objetivo->contenido}}</td>
                    @forelse ($objetivo->indicadores as $indicador)
                    <tr>
                       
                        <td>{{$indicador->indicador}}</td>
                        <td class="text-center">{{$indicador->meta}}</td>

                    @if (count($indicador->datos)) 
                        
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                {{$indicador->datos->last()->total }}
                            @else
                                {{ number_format($indicador->datos->last()->porcentaje, 0) }}%
                            @endif
                        </td>  
                        
                    @else                                       
                        <td>Año no registrado</td>  
                    @endif
                    
                    @if (count($indicador->datos)) 
                        
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                @if ($indicador->datos->last()->total >= $indicador->meta) 
                                    <div class="text-success">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->total < $indicador->meta && $indicador->datos->last()->total >= (int)substr($indicador->rojo, -2))
                                    <div class="text-warning">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->total < (int)substr($indicador->rojo, -2))
                                    <div class="text-danger">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @endif
                            @elseif ($indicador->tipo == "reducir") 

                                @if ($indicador->datos->last()->porcentaje <= $indicador->meta)
                                    <div class="text-success">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje > $indicador->meta && $indicador->datos->last()->porcentaje <= (int)substr($indicador->rojo, -2)) 
                                    <div class="text-warning">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje > (int)substr($indicador->rojo, -2)) 
                                    <div class="text-danger">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @endif
                            @else
                                @if ($indicador->datos->last()->porcentaje >= $indicador->meta) 
                                    <div class="text-success">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje < $indicador->meta && $indicador->datos->last()->porcentaje >= (int)substr($indicador->rojo, -2))
                                    <div class="text-warning">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @elseif ($indicador->datos->last()->porcentaje < (int)substr($indicador->rojo, -2)) 
                                    <div class="text-danger">
                                        <span class="fas fa-check"></span>
                                    </div>
                                @endif
                            @endif
                        </td>
                        
                    @else
                        <td>Año no registrado</td>  
                    @endif
                        
                    
                    </tr>
                    @empty
                    <tr>
                        <td></td>
                        <td colspan="10">
                            No hay indicadores.
                        </td>
                    </tr>
                @endforelse
                </tr>
                @empty
                <tr>
                    <td colspan="10">
                        No hay objetivos.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>            
    <div class="w-100 p-3">
        <table class="table table-bordered">
            <thead class="text-center">
                <th>Indicadores</th>
                <th> Verde </th> 
                <th> Amarillo </th> 
                <th> Rojo </th>
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
                            <td colspan="4">No hay indicadores</td>
                        </tr>
                    @endforelse
                    
                @empty
                    <tr>
                        <td colspan="4">No hay objetivos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>          
    </div>
</div>