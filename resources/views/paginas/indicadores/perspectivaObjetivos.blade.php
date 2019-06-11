<div class="row">
    <div class="col m12">
        <h3 class="blue-text center-align">{{$perspectivaObjetivos->titulo}}</h3>
        <ul>
            @forelse ($perspectivaObjetivos->objetivos as $objetivo)
            <div class="d-flex align-items-center">
                <h5>"{{$objetivo->contenido}}"</h5>
                
            </div>
            @forelse ($objetivo->indicadores as $indicador)
            <div class="card">
                <div class="card-content">
                    <li>
                        <div class="row no-margin teal padding-ultra-small">
                            <div class="col m5 white-text">
                                Indicador
                            </div>
                            <div class="col m2 white-text">
                                Unidad
                            </div>
                            <div class="col m1 white-text">
                                Tiempo
                            </div>
                            <div class="col m1 white-text">
                                Meta
                            </div>
                            <div class="col m1 white-text">
                                Verde
                            </div>
                            <div class="col m1 white-text">
                                Amarillo
                            </div>
                            <div class="col m1 white-text">
                                Rojo
                            </div>
                        </div>
                        <div class="row no-margin padding-ultra-small">
                            <div class="col m5">
                                {{$indicador->indicador}}
                            </div>
                            <div class="col m2">
                                {{$indicador->unidad}}
                            </div>
                            <div class="col m1">
                                {{$indicador->tiempo}}
                            </div>
                            <div class="col m1">
                                {{$indicador->meta}}
                            </div>
                            <div class="col m1">
                                {{$indicador->verde}}
                            </div>
                            <div class="col m1">
                                {{$indicador->amarillo}}
                            </div>
                            <div class="col m1">
                                {{$indicador->rojo}}
                            </div>

                        </div>
                    </li>
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
        </ul>
    </div>
</div>