<div class="row">
    <div class="col-md-12">
        <h3 class="text-center p-3 bg-dark text-white">{{$perspectivaObjetivos->titulo}}</h3>
        <ul class="list-group">
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
            <div class="d-flex align-items-center justify-content-between  p-2">
                <h6>{{$objetivo->slug}}: {{$objetivo->contenido}}</h6>
                <a href="{{route('indicadores.create', $objetivo->id)}}" class="ml-3 btn btn-outline-success text-uppercase"> + Indicador</a>
            </div>
            <table class="table table-bordered">
                <thead class="bg-primary text-white font-weight-bold">                    
                    <tr>
                        <td rowspan="2" class="text-center" style="vertical-align:middle; padding:0">Indicador</td>
                        <td rowspan="2" class="text-center" style="vertical-align:middle; padding:0">Unidad</td>
                        <td rowspan="2" class="text-center" style="vertical-align:middle; padding:0">Tiempo</td>
                        <td rowspan="2" class="text-center" style="vertical-align:middle; padding:0">Meta</td>                      
                            
                        <td colspan="3" class="text-center" style="vertical-align:middle; padding:0">Semáforo</td>
                    
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center bg-success" style="vertical-align:middle; padding:0">Verde</td>
                        <td class="text-center bg-warning" style="vertical-align:middle; padding:0">Amarillo</td>
                        <td class="text-center bg-danger" style="vertical-align:middle; padding:0">Rojo</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($objetivo->indicadores as $indicador)
                    <tr>
                        <td>{{ $indicador->indicador }}</td>
                        <td>{{ $indicador->unidad }}</td>
                        <td>{{ $indicador->tiempo }}</td>
                        <td>{{ $indicador->meta }}</td>
                        <td>{{ $indicador->verde }}</td>
                        <td>{{ $indicador->amarillo }}</td>
                        <td>{{ $indicador->rojo }}</td>
                        <td>
                            <a href="{{route('indicadores.edit',[$indicador->id, $objetivo->id])}} "
                                class="btn btn-sm btn-outline-info text-uppercase">
                                - Editar
                            </a>
                            <form action="{{route('indicadores.destroy',$indicador->id)}}" method="post">
                                    @csrf
                                @method('delete')
                                <button type="submit" class="mt-1 btn btn-sm btn-outline-danger text-uppercase">
                                    x Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Este objetivo no tiene indicadores.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @empty
            <li class="list-group-item">
                Esta perspectiva no tiene objetivos.
            </li>
            @endforelse
        </ul>
    </div>
</div>