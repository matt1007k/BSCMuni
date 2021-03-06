<div class="row">
        <div class="col-md-6">
            <div class="foda" style="max-width: 100%">
                <img src="{{ asset('img/foda.png') }}" alt="foda" class="w-100">
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="text-center bg-primary p-2 text-white">Fortalezas</h5>
            <ul class="list-group">
                @forelse ($fortalezas as $fortaleza)    
                    <li class="list-group-item">
                        <div class="row no-margin">
                            <div class="col-md-2 bd1-gray">
                                {{$fortaleza->slug}}
                            </div>
                            <div class="col-md-10">
                                {{$fortaleza->titulo}}
                            </div>
                        </div> 
                    </li>  
                @empty
                    <li class="list-group-item">No hay fortalezas.</li>                                        
                @endforelse
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-center bg-primary p-2 text-white">Oportunidades</h5>
            <ul class="list-group">
                @forelse ($oportunidades as $oportunidad)                                      
                    <li class="list-group-item">                    
                        <div class="row no-margin">
                            <div class="col-md-2 bd1-gray">
                                {{$oportunidad->slug}}
                            </div>
                            <div class="col-md-10">
                                {{$oportunidad->titulo}}
                            </div>
                        </div> 
                    </li>
                @empty
                    <li class="list-group-item">No hay oportunidades.</li>                                  
                @endforelse
            </ul>
        </div>
        <div class="col-md-6">
            <h5 class="text-center bg-dark p-2 text-white d-flex justify-content-between"><span>Estrategias FO</span></h5>            
            <ul class="list-group">
                @forelse ($estrategias as $estrategia)                                 
                    <li class="list-group-item">
                        <div class="row no-margin">
                            <div class="col-md-2 bd1-gray">
                                {{$estrategia->foda}}
                            </div>
                            <div class="col-md-7">
                                {{$estrategia->contenido}}
                            </div>
                            <div class="col-md-3">
                                
                            </div>
                        </div> 
                    </li>
                         
                @empty
                    <li class="list-group-item">No hay estrategias.</li>                                     
                @endforelse
            </ul>
        </div>
    </div>