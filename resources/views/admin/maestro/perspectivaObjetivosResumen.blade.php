<div class="row">
    <div class="col-md-12">
        <h3 class="display-3 font-weight-bold text-uppercase text-dark">{{$perspectivaObjetivos->titulo}}
            {{-- <a href="{{route('maestro.resumen.grafica', $perspectivaObjetivos->id)}}" target="_blank"
            class="btn btn-success">Ver grafica</a> --}}
        </h3>
        <table class="table table-bordered">
            <thead class="text-center">
                <th>Objetivos</th>
                <th>Indicador</th>
                <th>Meta</th>
                <th>Actual</th>
                <th>Semáforo</th>
            </thead>
            <tbody>
                @forelse ($perspectivaObjetivos->objetivos as $objetivo)
                <tr>
                    <td rowspan="{{$objetivo->indicadores->count() + 1}}" class="font-weight-bold">
                        {{$objetivo->contenido}}</td>
                    @forelse ($objetivo->indicadores as $indicador)
                <tr>

                    <td class="font-weight-bold">{{$indicador->indicador}}</td>
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
                    <td class="text-danger font-italic">Sin datos</td>
                    @endif

                    @if (count($indicador->datos))

                    <td class="text-center">
                        @if ($indicador->tipo == "numero" )
                        @if ($indicador->datos->last()->total >= $indicador->meta)
                        <div class="text-success">
                            <i class="mdi mdi-thumb-up"></i>
                        </div>
                        @elseif ($indicador->datos->last()->total < $indicador->meta && $indicador->datos->last()->total
                            >= (int)substr($indicador->rojo, -2))
                            <div class="text-warning">
                                <i class="mdi mdi-thumbs-up-down"></i>
                            </div>
                            @elseif ($indicador->datos->last()->total < (int)substr($indicador->rojo, -2))
                                <div class="text-danger">
                                    <i class="mdi mdi-thumb-down"></i>
                                </div>
                                @endif
                                @elseif ($indicador->tipo == "reducir")

                                @if ($indicador->datos->last()->porcentaje <= $indicador->meta)
                                    <div class="text-success">
                                        <i class="mdi mdi-thumb-up"></i>
                                    </div>
                                    @elseif ($indicador->datos->last()->porcentaje > $indicador->meta &&
                                    $indicador->datos->last()->porcentaje <= (int)substr($indicador->rojo, -2))
                                        <div class="text-warning">
                                            <i class="mdi mdi-thumbs-up-down"></i>
                                        </div>
                                        @elseif ($indicador->datos->last()->porcentaje > (int)substr($indicador->rojo,
                                        -2))
                                        <div class="text-danger">
                                            <i class="mdi mdi-thumb-down"></i>
                                        </div>
                                        @endif
                                        @else
                                        @if ($indicador->datos->last()->porcentaje >= $indicador->meta)
                                        <div class="text-success">
                                            <i class="mdi mdi-thumb-up"></i>
                                        </div>
                                        @elseif ($indicador->datos->last()->porcentaje < $indicador->meta &&
                                            $indicador->datos->last()->porcentaje >= (int)substr($indicador->rojo, -2))
                                            <div class="text-warning">
                                                <i class="mdi mdi-thumbs-up-down"></i>
                                            </div>
                                            @elseif ($indicador->datos->last()->porcentaje < (int)substr($indicador->
                                                rojo, -2))
                                                <div class="text-danger">
                                                    <i class="mdi mdi-thumb-down"></i>
                                                </div>
                                                @endif
                                                @endif
                    </td>

                    @else
                    <td class="text-danger font-italic">Sin datos</td>
                    @endif


                </tr>
                @empty
                <tr>
                    <td></td>
                    <td colspan="10" class="font-italic">
                        No hay indicadores.
                    </td>
                </tr>
                @endforelse
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="font-italic">
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
                <th class="bg-success"> Verde </th>
                <th class="bg-warning"> Amarillo </th>
                <th class="bg-danger"> Rojo </th>
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
                    <td colspan="4" class="font-italic">No hay indicadores</td>
                </tr>
                @endforelse

                @empty
                <tr>
                    <td colspan="4" class="font-italic">No hay objetivos.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>