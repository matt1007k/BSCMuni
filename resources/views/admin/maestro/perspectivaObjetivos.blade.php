<div class="row">
        <div class="col m12">
            <h3 class="blue-text center-align">{{$perspectivaObjetivos->titulo}}</h3>
            
            <div class="card">
                <div class="card-content">
                    <table class="table is-fullwidth">
                        <thead>
                            <th>Objetivos</th>
                            <th>Indicador</th>
                            <th>Unidad</th>
                            <th>Tiempo</th>
                            <th>Meta</th>
                            <th class="center-align">Valor anterior({{$anio_anterior}})</th>
                            <th class="center-align">Valor actual({{$anio_actual}})</th>
                            <th class="center-align">Semáforo <span>({{$semaforo}})</span></th>
                            <th>Verde</th>
                            <th>Amarillo</th>
                            <th>Rojo</th>
                        </thead>
                        <tbody>
                            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                            <tr>                                      
                                <td>{{$objetivo->contenido}}</td>
                                @forelse ($objetivo->indicadores as $indicador)
                                <tr>
                                    <td></td>
                                    <td>{{$indicador->indicador}}</td>
                                    <td>{{$indicador->unidad}}</td>
                                    <td>{{$indicador->tiempo}}</td>
                                    <td>{{$indicador->meta}}</td>

                                @if (count($indicador->datos->where('anio', $anio_anterior))) 
                                    @foreach ($indicador->datos->where('anio', $anio_anterior) as $dato)
                                        <td class="center-align">
                                            @if ($indicador->tipo == "numero" )
                                                {{$dato->total }}
                                            @else
                                                {{$dato->porcentaje }}%
                                            @endif
                                        </td>  
                                    @endforeach 
                                @else                                       
                                    <td class="red-text">No exite el año</td>  
                                @endif
                                @if ($indicador->datos->where('anio', $anio_actual)->count()) 
                                    @foreach ($indicador->datos->where('anio', $anio_actual) as $dato)
                                    <td class="center-align">
                                        @if ($indicador->tipo == "numero" )
                                            {{$dato->total }}
                                        @else
                                            {{$dato->porcentaje }}%
                                        @endif
                                    </td>
                                    @endforeach
                                @else 
                                    <td class="red-text">No exite el año</td>  
                                @endif
                                {{-- #= (ficha.rojo[2]<<(if ficha.rojo[3].present? then ficha.rojo[3] else '' end  --}}
                                @if (count($indicador->datos->where('anio', $semaforo))) 
                                    @foreach($indicador->datos->where('anio', $semaforo) as $dato)
                                    <td class="center-align">
                                        @if ($indicador->tipo == "numero" )
                                            @if ($dato->total >= $indicador->meta) 
                                                <p class="white-text green padding-small"> {{$dato->total}} </p>
                                            @elseif ($dato->total < $indicador->meta && $dato->total >= (int)substr($indicador->rojo, -2))
                                                <p class="white-text yellow darken-1 padding-small"> {{$dato->total}} </p>
                                            @elseif ($dato->total < (int)substr($indicador->rojo, -2))
                                                <p class="white-text red padding-small"> {{$dato->total}} </p>
                                            @endif
                                            @elseif ($indicador->tipo == "reducir") 

                                            @if ($dato->porcentaje <= $indicador->meta)
                                                <p class="white-text green padding-small"> {{$dato->porcentaje}} %</p>
                                            @elseif ($dato->porcentaje > $indicador->meta && $dato->porcentaje <= (int)substr($indicador->rojo, -2)) 
                                                <p class="white-text yellow darken-1 padding-small"> {{$dato->porcentaje}} %</p>
                                            @elseif ($dato->porcentaje > (int)substr($indicador->rojo, -2)) 
                                                <p class="white-text red padding-small"> {{$dato->porcentaje}} %</p>
                                            @endif
                                        @else
                                            @if ($dato->porcentaje >= $indicador->meta) 
                                                <p class="white-text green padding-small"> {{$dato->porcentaje}} %</p>
                                            @elseif ($dato->porcentaje < $indicador->meta && $dato->porcentaje >= (int)substr($indicador->rojo, -2))
                                                <p class="white-text yellow darken-1 padding-small"> {{$dato->porcentaje}} %</p>
                                            @elseif ($dato->porcentaje < (int)substr($indicador->rojo, -2)) 
                                                <p class="white-text red padding-small"> {{$dato->porcentaje}} %</p>
                                            @endif
                                        @endif
                                    </td>
                                    @endforeach
                                @else
                                    <td class="red-text">No exite el año</td>  
                                @endif
                                    <td class="center-align white-text green"> {{$indicador->verde}} </td> 
                                    <td class="center-align white-text yellow darken-1"> {{$indicador->amarillo}} </td> 
                                    <td class="center-align white-text red"> {{$indicador->rojo}} </td> 
                                
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
                
                {{-- @empty
                <div class="card">
                    <div class="card-content">
                        <li>
                            Este objetivo no tiene indicadores.
                        </li>
                    </div>
                </div>
    
                @endforelse
    
                @empty
                <div class="card">
                    <div class="card-content">
                        <li>
                            Esta perspectiva no tiene objetivos.
                        </li>
                    </div>
                </div>
                @endforelse --}}
           
        </div>
    </div>