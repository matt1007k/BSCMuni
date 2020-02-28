<div class="row">
    <div class="col-md-6">
        <div class="foda" style="max-width: 100%">
            <img src="{{ asset('images/foda.png') }}" alt="foda" class="w-100">
        </div>
    </div>
    <div class="col-md-6">
        <h5 class="h3 font-weight-bold p-2 text-dark">Debilidades</h5>
        <ul class="list-group">
            @forelse ($debilidades as $debilidad)
            <li class="list-group-item d-flex">
                <div class="mr-1 text-muted">
                    {{$debilidad->slug}}:
                </div>
                <div class="">
                    {{$debilidad->titulo}}
                </div>
            </li>
            @empty
            <li class="list-group-item">No hay debilidades.</li>
            @endforelse
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h5 class="h3 font-weight-bold p-2 text-dark">Oportunidades</h5>
        <ul class="list-group">
            @forelse ($oportunidades as $oportunidad)
            <li class="list-group-itemd-flex">
                <div class="mr-1 text-muted">
                    {{$oportunidad->slug}}:
                </div>
                <div class="col-md-10">
                    {{$oportunidad->titulo}}
                </div>
            </li>
            @empty
            <li class="list-group-item">No hay oportunidades.</li>
            @endforelse
        </ul>
    </div>
    <div class="col-md-6">
        <h5 class="h3 font-weight-bold p-2 text-dark text-uppercase"><span>Estrategias DO </span><a
                href="{{route('estrategias.create', $tipo)}}" class="btn btn-success btn-sm">
                Registrar estratégia</a></h5>
        <ul class="list-group">
            @forelse ($estrategias as $estrategia)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    <div class="text-muted text-uppercase font-weight-bold flex-1">
                        {{$estrategia->foda}}
                    </div>
                    <div class="text-justify">
                        {{$estrategia->contenido}}
                    </div>
                </div>
                <div class="ml-2">
                    <a href="{{route('estrategias.edit', [$tipo, $estrategia->id] )}}"
                        class="btn btn-rounded btn-icons btn-info" data-toggle="tooltip" data-placement="top"
                        title="Editar registro">
                        <i class="mdi mdi-pencil"></i></a>
                    <form action="{{route('estrategias.destroy', $estrategia->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-1 btn btn-rounded btn-icons btn-danger" data-toggle="tooltip"
                            data-placement="top" title="Eliminar registro">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </div>
            </li>

            @empty
            <li class="list-group-item">No hay estrategias.</li>
            @endforelse
        </ul>
    </div>
</div>
</div>