@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('factor.externo')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> Evaluar factor externo
            </a>
            <div class="card">                
                <div class="card-content ">                           
                    
                    <div class="card-title">Evaluar factor: "{{$factor->titulo}}"</div>
                
                    <form action="{{route('factor.evaluacionExterno', $factor->id)}}" method="POST">
                        @csrf
                        @method('put') 
                        <div class="row">
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
                        <div class="row mt-3">
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
                                <button type="submit" class="waves-effect waves-light btn">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection