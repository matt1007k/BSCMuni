@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md">                                   
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card-title h3 text-center">
                        Información de la organización
                    </div>
                </div>
            </div>  
            <div class="row">    
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Misión</th>
                                <th>Visión</th>
                                <th>Macroproceso</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            @forelse ($informaciones as $informacion)
                                <tr>
                                    <td>{{ $informacion->nombre }}</td>
                                    <td>{{ $informacion->mision }}</td>
                                    <td>{{ $informacion->vision }}</td>
                                    <td>{{ $informacion->macroproceso }}</td>
                                    
                                </tr>
                            @empty                                        
                                
                                <tr>
                                    <td colspan="5">No hay ningún registro!!!</td>
                                </tr>
                                    
                            @endforelse
                                                            
                            
                        </tbody>
                    </table>
                    <div class="w-100 text-center">
                        {{ $informaciones->links() }}
                    </div>    
                </div>
            </div>
        </div>      
    </div>
</div>
@endsection