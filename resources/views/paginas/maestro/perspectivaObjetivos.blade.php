<div class="row">
    <div class="col-md-12">
        <h3 class="bg-info text-white text-center p-2">{{$perspectivaObjetivos->titulo}}</h3>
            
        <table class="table table-striped table-dark table-responsive">
            <thead class="text-center">
                <th>Objetivos</th>
                <th style="max-width: 100%">Indicador</th>
                <th>Unidad</th>
                <th>Tiempo</th>
                <th>Meta</th>
                <th class="text-center">Valor anterior({{$anio_anterior}})</th>
                <th class="text-center">Valor actual({{$anio_actual}})</th>
                <th class="text-center">Semáforo <span>({{$semaforo}})</span></th>
                <th class="text-success">Verde</th>
                <th class="text-warning">Amarillo</th>
                <th class="text-danger">Rojo</th>
            </thead>
            <tbody>
                @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                <tr>                                      
                    <td>{{$objetivo->contenido}}</td>
                    @forelse ($objetivo->indicadores as $indicador)
                    <tr>
                        <td></td>
                        <td style="max-width: 100%">{{$indicador->indicador}}</td>
                        <td>{{$indicador->unidad}}</td>
                        <td>{{$indicador->tiempo}}</td>
                        <td>{{$indicador->meta}}</td>

                    @if (count($indicador->datos->where('anio', $anio_anterior))) 
                        @foreach ($indicador->datos->where('anio', $anio_anterior) as $dato)
                            <td class="text-center">
                                @if ($indicador->tipo == "numero" )
                                    {{ $dato->total }}
                                @else
                                    {{ number_format($dato->porcentaje, 0) }}%
                                @endif
                            </td>  
                        @endforeach 
                    @else                                       
                        <td>El valor no existe</td>  
                    @endif
                    @if ($indicador->datos->where('anio', $anio_actual)->count()) 
                        @foreach ($indicador->datos->where('anio', $anio_actual) as $dato)
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                {{$dato->total }}
                            @else
                                {{ number_format($dato->porcentaje, 0) }}%
                            @endif
                        </td>
                        @endforeach
                    @else 
                        <td>El valor no existe</td>  
                    @endif
                    {{-- #= (ficha.rojo[2]<<(if ficha.rojo[3].present? then ficha.rojo[3] else '' end  --}}
                    @if (count($indicador->datos->where('anio', $semaforo))) 
                        @foreach($indicador->datos->where('anio', $semaforo) as $dato)
                        <td class="text-center">
                            @if ($indicador->tipo == "numero" )
                                @if ($dato->total >= $indicador->meta) 
                                    <p class="text-success padding-small font-weight-bold"> {{$dato->total}} </p>
                                @elseif ($dato->total < $indicador->meta && $dato->total >= (int)substr($indicador->rojo, -2))
                                    <p class="text-warning padding-small font-weight-bold"> {{$dato->total}} </p>
                                @elseif ($dato->total < (int)substr($indicador->rojo, -2))
                                    <p class="text-danger padding-small font-weight-bold"> {{$dato->total}} </p>
                                @endif
                                @elseif ($indicador->tipo == "reducir") 

                                @if ($dato->porcentaje <= $indicador->meta)
                                    <p class="text-success padding-small font-weight-bold"> {{number_format($dato->porcentaje, 0)}} %</p>
                                @elseif ($dato->porcentaje > $indicador->meta && $dato->porcentaje <= (int)substr($indicador->rojo, -2)) 
                                    <p class="text-warning padding-small font-weight-bold"> {{number_format($dato->porcentaje, 0)}} %</p>
                                @elseif ($dato->porcentaje > (int)substr($indicador->rojo, -2)) 
                                    <p class="text-danger padding-small font-weight-bold"> {{number_format($dato->porcentaje, 0)}} %</p>
                                @endif
                            @else
                                @if ($dato->porcentaje >= $indicador->meta) 
                                    <p class="text-success padding-small font-weight-bold"> {{number_format($dato->porcentaje, 0)}} %</p>
                                @elseif ($dato->porcentaje < $indicador->meta && $dato->porcentaje >= (int)substr($indicador->rojo, -2))
                                    <p class="text-warning padding-small font-weight-bold"> {{$number_format($dato->porcentaje, 0)}} %</p>
                                @elseif ($dato->porcentaje < (int)substr($indicador->rojo, -2)) 
                                    <p class="text-white padding-small font-weight-bold"> {{number_format($dato->porcentaje, 0)}} %</p>
                                @endif
                            @endif
                        </td>
                        @endforeach
                    @else
                        <td>El valor no existe</td>  
                    @endif
                        <td class="text-center"> {{$indicador->verde}} </td> 
                        <td class="text-center"> {{$indicador->amarillo}} </td> 
                        <td class="text-center"> {{$indicador->rojo}} </td> 
                    
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
</div>