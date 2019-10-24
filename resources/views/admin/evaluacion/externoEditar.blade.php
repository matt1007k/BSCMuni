@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card border-dark">                
                <div class="card-header bg-dark text-white h3">Factor: "{{$factor->titulo}}"</div>
                <div class="card-body ">                           
                    
                
                    <form action="{{route('factor.evaluacionExterno', $factor->id)}}" method="POST">
                        @csrf
                        @method('put') 
                        <div class="form-group">
                            <h6>Probabilidad de Ocurrencia</h6>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="probabilidad" value="3" {{$factor->alta == '3' ? 'checked' : ''}} />
                                    <span>Alta (3)</span>
                                </label>
                            </div>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="probabilidad" value="2" {{$factor->media == '2' ? 'checked' : ''}} />
                                    <span>Media (2)</span>
                                </label>
                            </div>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="probabilidad" value="1" {{$factor->baja == '1' ? 'checked' : ''}}/>
                                    <span>Baja (1)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <h6>Impacto a nuestro negocio</h6>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="impacto" value="2" {{$factor->muy_positivo == '2' ? 'checked' : ''}} />
                                    <span>Muy Positivo (+2)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="impacto" value="1" {{$factor->positivo == '1' ? 'checked' : ''}} />
                                    <span>Positivo (+1)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="impacto" value="-1" {{$factor->negativo == '-1' ? 'checked' : ''}} />
                                    <span>Negativo (-1)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="impacto" value="-2" {{$factor->muy_negativo == '-2' ? 'checked' : ''}} />
                                    <span>Muy Negativo (-2)</span>
                                </label>
                            </div>
                        </div>   
                        <div class="row mt-2">
                            <div class="col m12">
                                <button type="submit" class="btn btn-primary text-uppercase">Calificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{route('factor.externo')}}" class="btn btn-link text-uppercase">
                <- Ir a factores externos 
            </a>

        </div>        
    </div>
@endsection