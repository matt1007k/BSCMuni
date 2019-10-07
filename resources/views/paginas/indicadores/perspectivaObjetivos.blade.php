<div class="row">
    <div class="col-md-12">
        <h3 class="text-center text-white bg-info p-3">{{$perspectivaObjetivos->titulo}}</h3>
        <ul class="list-group">
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
            <div class="d-flex align-items-center justify-content-between bg-primary p-2">
                <h5 class="text-white">Objetivo: {{$objetivo->contenido}}</h5>
            </div>
            <div class="row no-margin px-4 py-2">
                <div class="col-md-3 text-center font-weight-bold bd1-gray">
                    Indicador
                </div>
                <div class="col-md-1 no-padding text-center font-weight-bold bd1-gray">
                    Unidad
                </div>
                <div class="col-md-2 no-padding text-center font-weight-bold bd1-gray">
                    Tiempo
                </div>
                <div class="col-md-1 text-center font-weight-bold bd1-gray">
                    Meta
                </div>
                <div class="col-md-1 text-center font-weight-bold text-success bd1-gray">
                    Verde
                </div>
                <div class="col-md-2 text-center font-weight-bold text-warning bd1-gray">
                    Amarillo
                </div>
                <div class="col-md-1 text-center font-weight-bold text-danger bd1-gray">
                    Rojo
                </div>
                <div class="col-md-1">

                </div>
            </div>
            @forelse ($objetivo->indicadores as $indicador)
                
            <li class="list-group-item">                        
                <div class="row no-margin padding-ultra-small">
                    <div class="col-md-3 bd1-gray">
                        {{$indicador->indicador}}
                    </div>
                    <div class="col-md-1 text-center bd1-gray">
                        {{$indicador->unidad}}
                    </div>
                    <div class="col-md-2 bd1-gray">
                        {{$indicador->tiempo}}
                    </div>
                    <div class="col-md-1 text-center bd1-gray">
                        {{$indicador->meta}}
                    </div>
                    <div class="col-md-1 text-center bd1-gray">
                        {{$indicador->verde}}
                    </div>
                    <div class="col-md-2 text-center bd1-gray">
                        {{$indicador->amarillo}}
                    </div>
                    <div class="col-md-1 text-center bd1-gray">
                        {{$indicador->rojo}}
                    </div>

                </div>
            </li>
            @empty
            <li class="list-group-item">
                Este objetivo no tiene indicadores.
            </li>
            @endforelse

            @empty
            <li class="list-group-item">
                Esta perspectiva no tiene objetivos.
            </li>
            @endforelse
        </ul>
    </div>
</div>