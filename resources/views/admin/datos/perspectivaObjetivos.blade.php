<div class="row">
    <div class="col m12">
        <h3 class="bg-dark text-white p-2 text-center">{{$perspectivaObjetivos->titulo}}</h3>
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                <div class=" d-flex justify-content-between pt-2 pb-2">
                    <h4>{{$objetivo->slug}}: <span class="font-weight-normal">{{$objetivo->contenido}}</span></h4>
                    @if ($objetivo->indicadores->count() > 0)
                        
                    <a href="{{route('datos.grafica', $objetivo->id)}}" class="btn btn-outline-primary text-uppercase">
                        <span>Graficas</span>    
                    </a>
                    @endif
                </div>
                @forelse ($objetivo->indicadores as $indicador)
                    <div class="d-flex align-items-center justify-content-between">
                        <h5>Indicador: <span class="font-weight-normal">{{$indicador->indicador}}</span></h5>
                        <a href="{{route('datos.create', $indicador->id)}}" class="ml-3 btn btn-outline-success text-uppercase">+ datos</a>
                    </div>
                    <table class="table  table-striped">
                        <thead class="bg-primary text-white">
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
                                <td>
                                    <a href="{{route('datos.edit',[$dato->id, $indicador->id])}} "
                                        class="btn btn-sm btn-outline-info text-uppercase">
                                        - Editar
                                    </a>
                                    <form action="{{route('datos.destroy',$dato->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="mt-1 btn btn-sm btn-outline-danger text-uppercase">
                                            x Eliminar
                                        </button>
                                    </form>
                                    
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="15">
                                    Sin datos registrados.
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
                    <div class="card-body">No tiene indicadores.</div>
                </div>

                @endforelse

            @empty
            <div class="card">
                <div class="card-body">No tiene objetivos.</div>
            </div>
            @endforelse
       
    </div>
</div>