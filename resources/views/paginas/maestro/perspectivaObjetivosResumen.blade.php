<div class="row">
        <div class="col m12">
            <h3 class="blue-text center-align">{{$perspectivaObjetivos->titulo}}</h3>
            
            <div class="card">
                <div class="card-content">
                    <table class="table is-fullwidth">
                        <thead>
                            <th>Objetivos</th>
                            <th>Indicador</th>
                            <th>Meta</th>
                            <th class="center-align">Actual</th>
                            <th class="center-align">Semáforo</th>
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
                                   
                                    <td class="center-align">
                                        @if ($indicador->tipo == "numero" )
                                            {{$indicador->datos->last()->total }}
                                        @else
                                            {{$indicador->datos->last()->porcentaje }}%
                                        @endif
                                    </td>  
                                    
                                @else                                       
                                    <td class="red-text">No exite el año</td>  
                                @endif
                                
                                @if (count($indicador->datos)) 
                                    
                                    <td class="center-align">
                                        @if ($indicador->tipo == "numero" )
                                            @if ($indicador->datos->last()->total >= $indicador->meta) 
                                                <div class="green-text icon3x">
                                                    <span class="eva eva-checkmark-circle-2-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->total < $indicador->meta && $indicador->datos->last()->total >= (int)substr($indicador->rojo, -2))
                                                <div class="yellow-text darken-1 icon3x">
                                                    <span class="eva eva-checkmark-circle-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->total < (int)substr($indicador->rojo, -2))
                                                <div class="red-text icon3x">
                                                    <span class="eva eva-close-circle-outline"></span>
                                                </div>
                                            @endif
                                        @elseif ($indicador->tipo == "reducir") 

                                            @if ($indicador->datos->last()->porcentaje <= $indicador->meta)
                                                <div class="green-text icon3x">
                                                    <span class="eva eva-checkmark-circle-2-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->porcentaje > $indicador->meta && $indicador->datos->last()->porcentaje <= (int)substr($indicador->rojo, -2)) 
                                                <div class="yellow-text darken-1 icon3x">
                                                    <span class="eva eva-checkmark-circle-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->porcentaje > (int)substr($indicador->rojo, -2)) 
                                                <div class="red-text icon3x">
                                                    <span class="eva eva-close-circle-outline"></span>
                                                </div>
                                            @endif
                                        @else
                                            @if ($indicador->datos->last()->porcentaje >= $indicador->meta) 
                                                <div class="green-text icon3x">
                                                    <span class="eva eva-checkmark-circle-2-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->porcentaje < $indicador->meta && $indicador->datos->last()->porcentaje >= (int)substr($indicador->rojo, -2))
                                                <div class="yellow-text darken-1 icon3x">
                                                    <span class="eva eva-checkmark-circle-outline"></span>
                                                </div>
                                            @elseif ($indicador->datos->last()->porcentaje < (int)substr($indicador->rojo, -2)) 
                                                <div class="red-text icon3x">
                                                    <span class="eva eva-close-circle-outline"></span>
                                                </div>
                                            @endif
                                        @endif
                                    </td>
                                   
                                @else
                                    <td class="red-text">No exite el año</td>  
                                @endif
                                    
                                
                                </tr>
                                @empty
                                <tr>
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
            </div>
                
            <div class="card">
                <div class="card-content">
                    <table>
                        <thead>
                            <th>Indicadores</th>
                            <th class="center-align white-text green"> Verde </th> 
                            <th class="center-align white-text yellow darken-1"> Amarillo </th> 
                            <th class="center-align white-text red"> Rojo </th>
                        </thead>
                        <tbody>
                            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                                @forelse ($objetivo->indicadores as $indicador)
                                <tr>
                                    <td>{{$indicador->indicador}}</td>
                                    <td class="center-align">{{$indicador->verde}}</td>
                                    <td class="center-align">{{$indicador->amarillo}}</td>
                                    <td class="center-align">{{$indicador->rojo}}</td>
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
        </div>
    </div>