<div class="row">
    <div class="col m12">
        <h3 class="text-center text-white bg-info p-2">{{$perspectivaObjetivos->titulo}}</h3>
        
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
            <div class="p-2 bg-primary text-white">
                <h4>Objetivo: {{$objetivo->contenido}}</h4>
            </div>
            @forelse ($objetivo->indicadores as $indicador)
                <div class="d-flex align-items-center justify-content-between p-2">
                    <h5>Indicador: {{$indicador->indicador}}</h5>
                    <div>
                        @if(count($indicador->datos) > 0)
                        {{-- Grafica --}}
                        <a href="{{route('paginas.grafica', $indicador->id)}}" class="btn btn-outline-dark">
                            <span>Ver Grafica</span>    
                        </a>
                        @endif
                    </div>
                </div>
                <table class="table  table-striped table-dark">
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
                    </thead>
                    <tbody>
                        @forelse ($indicador->datos as $dato)
                        <tr>                                      
                            <td class="text-center">{{$dato->anio}}</td>
                            <td class="text-center">{{$dato->enero}}</td>
                            <td class="text-center">{{$dato->febrero}}</td>
                            <td class="text-center">{{$dato->marzo}}</td>
                            <td class="text-center">{{$dato->abril}}</td>
                            <td class="text-center">{{$dato->mayo}}</td>
                            <td class="text-center">{{$dato->junio}}</td>
                            <td class="text-center">{{$dato->julio}}</td>
                            <td class="text-center">{{$dato->agosto}}</td>
                            <td class="text-center">{{$dato->septiembre}}</td>
                            <td class="text-center">{{$dato->octubre}}</td>
                            <td class="text-center">{{$dato->noviembre}}</td>
                            <td class="text-center">{{$dato->diciembre}}</td>
                            <td class="text-center">{{$dato->total}}</td>
                            <td class="text-center"> 
                                @if($dato->porcentaje != 0)
                                {{number_format($dato->porcentaje, 0)}} 
                                @endif 
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
                                <td class="text-center">{{$indicador->datos->sum('total')}}</td>
                                <td colspan="2"></td>                                              
                            </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
                
                    
            
            @empty
            <div class="card">
                <div class="card-body">Este objetivo no tiene indicadores.</div>
            </div>

            @endforelse

            @empty
            <div class="card">
                <div class="card-body">Esta perspectiva no tiene objetivos.</div>
            </div>
            @endforelse
       
    </div>
</div>