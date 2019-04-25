@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12">
            <div class="card">                
                <div class="card-content ">                          
                    <div class="row">
                        <div class="col m12 d-flex justify-center">
                            <div class="card-title">
                                Información de la organización:
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col m12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Misión</th>
                                        <th>Visión</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @forelse ($informaciones as $informacion)
                                        <tr>
                                            <td>{{ $informacion->nombre }}</td>
                                            <td>"{{ $informacion->mision }}"</td>
                                            <td>"{{ $informacion->vision }}"</td>
                                        </tr>
                                    @empty                                        
                                        
                                        <tr>
                                            <td colspan="5">No hay ningún registro!!!</td>
                                        </tr>
                                            
                                    @endforelse
                                                                    
                                    
                                </tbody>
                            </table>
                            <div class="w-100 center-align">
                                {{ $informaciones->links() }}
                            </div>    
                        </div>
                </div>
            </div>
            
        </div>        
    </div>
@endsection