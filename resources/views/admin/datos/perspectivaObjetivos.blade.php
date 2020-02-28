<div class="row">
    <div class="col-md p-0">
        <div class="display-3 font-weight-bold text-uppercase text-dark">{{$perspectivaObjetivos->titulo}}</div>
        @forelse ($perspectivaObjetivos->objetivos as $objetivo)
        <div class=" d-flex justify-content-between align-items-center pt-2 pb-2">
            <h4 class="h3 font-weight-bold"><span class="text-muted">{{$objetivo->slug}}:</span>
                {{$objetivo->contenido}}</h4>
            @if ($objetivo->indicadores->count() > 0)

            <a href="{{route('datos.graficas', $objetivo->id)}}" class="btn btn-primary text-uppercase"
                data-toggle="tooltip" data-placement="top" title="Comparar en gráficas">
                <i class="mdi mdi-chart-bar"></i>
            </a>
            @endif
        </div>
        <div class="h3 font-italic">Indicadores</div>
        @forelse ($objetivo->indicadores as $key => $indicador)
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="" data-toggle="collapse" href="#collapsed{{$indicador->id}}" role="button" aria-expanded="false"
                aria-controls="collapseExample"><span class="font-weight-bold">{{ $key + 1}}.-
                    {{$indicador->indicador}}</span>
            </h5>
            <div>
                <a href="{{route('datos.create', $indicador->id)}}" class="ml-3 btn btn-success">
                    Registrar datos de un año
                </a>
                {{-- <a href="{{route('datos.grafica', $indicador->id)}}" class="btn btn-primary text-uppercase"
                data-toggle="tooltip" data-placement="top" title="Ver gráfica">
                <i class="mdi mdi-chart-bar"></i>
                </a> --}}
            </div>
        </div>
        <div class="collapsed mb-3" id="collapse{{$indicador->id}}">
            <table class="table  table-striped table-responsive">
                <thead class="">
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
                                class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip"
                                data-placement="top" title="Editar registro">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form action="{{route('datos.destroy',$dato->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="mt-1 btn btn-rounded btn-icons btn-danger btn-sm"
                                    data-toggle="tooltip" data-placement="top" title="Eliminar registro">
                                    <i class="mdi mdi-delete"></i>
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
                    @if ($indicador->tipo == 'numero' || $indicador->tipo == 'porcentaje') <tr>
                    <tr>
                        <td colspan="12"></td>
                        <td class="h5"><strong>Total:</strong></td>
                        <td class="text-center">{{$indicador->datos->sum('total')}}</td>
                        <td colspan="2"></td>
                    </tr>
                    @endif
                    @endif
                </tbody>
            </table>
        </div>


        @empty
        <div class="p-3 bg-secondary">
            <div class="font-italic">No tiene indicadores.</div>
        </div>

        @endforelse

        @empty
        <div class="p-3 bg-secondary">
            <div class="font-italic">No tiene objetivos.</div>
        </div>
        @endforelse

    </div>
</div>