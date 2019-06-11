<div class="row">
    <div class="col m12">
        <h3 class="blue-text center-align">{{$perspectivaObjetivos->titulo}}</h3>
        
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
            <div class="d-flex align-items-center">
                <h4>"{{$objetivo->contenido}}"</h4>
            </div>
            @forelse ($objetivo->indicadores as $indicador)
                <div class="d-flex align-items-center justify-content-between">
                    <h5>Indicador: {{$indicador->indicador}}</h5>
                    <div>
                        @if(count($indicador->datos) > 0)
                        {{-- Grafica --}}
                        <a href="{{route('paginas.grafica', $indicador->id)}}" class="btn light-blue"> 
                            <div class="eva eva-bar-chart-outline"></div>
                            <span>Ver Grafica</span>    
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <table class="table is-fullwidth">
                            <thead>
                                <th>Año</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                                <th>Total</th>
                                <th>%</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @forelse ($indicador->datos as $dato)
                                <tr>                                      
                                    <td class="center-align">{{$dato->anio}}</td>
                                    <td class="center-align">{{$dato->enero}}</td>
                                    <td class="center-align">{{$dato->febrero}}</td>
                                    <td class="center-align">{{$dato->marzo}}</td>
                                    <td class="center-align">{{$dato->abril}}</td>
                                    <td class="center-align">{{$dato->mayo}}</td>
                                    <td class="center-align">{{$dato->junio}}</td>
                                    <td class="center-align">{{$dato->julio}}</td>
                                    <td class="center-align">{{$dato->agosto}}</td>
                                    <td class="center-align">{{$dato->septiembre}}</td>
                                    <td class="center-align">{{$dato->octubre}}</td>
                                    <td class="center-align">{{$dato->noviembre}}</td>
                                    <td class="center-align">{{$dato->diciembre}}</td>
                                    <td class="center-align">{{$dato->total}}</td>
                                    <td class="center-align"> 
                                        @if($dato->porcentaje != 0)
                                        {{$dato->porcentaje}} %
                                        @else 
                                        
                                        @endif 
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15">
                                        Este indicador no tiene datos.
                                    </td>
                                </tr>
                                @endforelse

                                <!-- total -->
                                @if(count($indicador->datos) > 0)
                                    @if ($indicador->tipo == 'numero' || $indicador->tipo == 'porcentaje')                                 <tr>                                      
                                    <tr>
                                        <td colspan="12"></td>
                                        <td><strong>Total:</strong></td>
                                        <td class="center-align">{{$indicador->datos->sum('total')}}</td>
                                        <td colspan="2"></td>                                              
                                    </tr>
                                    @endif
                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            
            @empty
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
            @endforelse
       
    </div>
</div>