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
        <h5 class="blue-text center-align">OPORTUNIDADES</h5>
        <ul>
            @forelse ($oportunidades as $oportunidad)   
                <div class="card">
                    <div class="card-content">                                     
                        <li>                    
                            <div class="row no-margin">
                                <div class="col m1">
                                    {{$oportunidad->slug}}
                                </div>
                                <div class="col m11">
                                    {{$oportunidad->titulo}}
                                </div>
                            </div> 
                        </li>
                    </div>
                </div>   
            @empty
                <div class="card">
                    <div class="card-content">
                        <li>No hay oportunidades.</li>  
                    </div>
                </div>                                      
            @endforelse
        </ul>
    </div>
    <div class="col m6">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="blue-text">ESTRATEGIAS FO</h5>
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
                                <div class="col m10">
                                    {{$estrategia->contenido}}
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