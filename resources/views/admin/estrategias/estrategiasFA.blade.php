<div class="row">
    <div class="col m6">
        <div class="foda">
        </div>
    </div>
    <div class="col m6">
        <h5 class="blue-text center-align">FORTALEZAS</h5>
        <ul>
            @forelse ($fortalezas as $fortaleza)                                        
                <div class="card">
                    <div class="card-content">
                        <li>
                            <div class="row no-margin">
                                <div class="col m1">
                                    {{$fortaleza->slug}}
                                </div>
                                <div class="col m11">
                                    {{$fortaleza->titulo}}
                                </div>
                            </div> 
                        </li>
                    </div>
                </div>   
            @empty
                <li>
                    <div class="card">
                        <div class="card-content">
                            <li>No hay fortalezas.</li>  
                        </div>
                    </div>     
                </li>                                        
            @endforelse
        </ul>
    </div>
</div>
<div class="row">
    <div class="col m6">
        <h5 class="blue-text center-align">AMENAZAS</h5>
        <ul>
            @forelse ($amenazas as $amenaza)   
                <div class="card">
                    <div class="card-content">                                     
                        <li>                    
                            <div class="row no-margin">
                                <div class="col m1">
                                    {{$amenaza->slug}}
                                </div>
                                <div class="col m11">
                                    {{$amenaza->titulo}}
                                </div>
                            </div> 
                        </li>
                    </div>
                </div>   
            @empty
                <div class="card">
                    <div class="card-content">
                        <li>No hay amenazas.</li>  
                    </div>
                </div>                                      
            @endforelse
        </ul>
    </div>
    <div class="col m6">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="blue-text">ESTRATEGIAS FA</h5>
            <a href="{{route('estrategias.create', $tipo)}}" class="btn green">Agregar</a>
        </div>
        <ul>
            @forelse ($estrategias as $estrategia)   
                <div class="card">
                    <div class="card-content">                                     
                        <li>
                            <div class="row no-margin">
                                <div class="col m2">
                                    {{$estrategia->foda}}
                                </div>
                                <div class="col m7">
                                    {{$estrategia->contenido}}
                                </div>
                                <div class="col m3">
                                    <a href="{{route('estrategias.edit', [$tipo, $estrategia->id] )}}" class="btn indigo">MODIFICAR</a>
                                    <form action="{{route('estrategias.destroy', $estrategia->id)}}" method="POST">
                                        @csrf                                 
                                        @method('delete')
                                        <button type="submit" class="btn red">
                                            Eliminar
                                        </button>                                    
                                    </form>
                                </div>
                            </div> 
                        </li>
                    </div>
                </div>  
            @empty
                <div class="card">
                    <div class="card-content">
                        <li>No hay estrategias.</li>  
                    </div>
                </div>                                       
            @endforelse
        </ul>
    </div>
</div>