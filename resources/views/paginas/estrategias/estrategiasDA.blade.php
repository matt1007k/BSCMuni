<div class="row">
    <div class="col m6">
        <div class="foda">
        </div>
    </div>
    <div class="col m6">
        <h5 class="blue-text center-align">DEBILIDADES</h5>
        <ul>
            @forelse ($debilidades as $debilidad)                                        
                <div class="card">
                    <div class="card-content">
                        <li>
                            <div class="row no-margin">
                                <div class="col m1">
                                    {{$debilidad->slug}}
                                </div>
                                <div class="col m11">
                                    {{$debilidad->titulo}}
                                </div>
                            </div> 
                        </li>
                    </div>
                </div>   
            @empty
                <li>
                    <div class="card">
                        <div class="card-content">
                            <li>No hay debilidades.</li>  
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
            <h5 class="blue-text">ESTRATEGIAS DA</h5>
            
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