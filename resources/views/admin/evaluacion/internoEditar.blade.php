@extends('layouts.app')

@section('content')
    <div class="row  d-flex justify-content-center">
        <div class="col-md-6">
            <a href="{{route('factor.interno')}}" class="btn btn-secondary">
               <- Regresar
            </a>
            <div class="card">                
                <div class="card-header h3">Calificar la actividad: "{{$actividad->titulo}}"</div>
                <div class="card-body ">                  
                    <form action="{{route('factor.evaluacionInterno', $actividad->id)}}" method="POST">
                        @csrf
                        @method('put') 
                        <div class="form-group">
                            <h6>Importancia de éxito</h6>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="importancia" value="3" {{$actividad->alta == '3' ? 'checked' : ''}} />
                                    <span>Alta (3)</span>
                                </label>
                            </div>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="importancia" value="2" {{$actividad->media == '2' ? 'checked' : ''}} />
                                    <span>Media (2)</span>
                                </label>
                            </div>
                            <div class="input-field col m4">
                                <label>
                                    <input type="checkbox" name="importancia" value="1" {{$actividad->baja == '1' ? 'checked' : ''}}/>
                                    <span>Baja (1)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6>Desempeño de la empresa</h6>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="desempeno" value="2" {{$actividad->muy_bueno == '2' ? 'checked' : ''}} />
                                    <span>Muy Bueno (+2)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="desempeno" value="1" {{$actividad->bueno == '1' ? 'checked' : ''}} />
                                    <span>Bueno (+1)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="desempeno" value="-1" {{$actividad->deficiente == '-1' ? 'checked' : ''}} />
                                    <span>Deficiente (-1)</span>
                                </label>
                            </div>
                            <div class="input-field col m3 mb-2">
                                <label>
                                    <input type="checkbox" name="desempeno" value="-2" {{$actividad->muy_deficiente == '-2' ? 'checked' : ''}} />
                                    <span>Muy Deficiente (-2)</span>
                                </label>
                            </div>
                        </div>   
                        <div class="row mt-2">
                            <div class="col m12">
                                <button type="submit" class="btn btn-primary btn-block">Calificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection