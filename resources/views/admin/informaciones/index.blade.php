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
                            <a href="{{route('informaciones.create')}}" class="ml-1 btn waves-effect waves-light tooltipped red" 
                                data-position="bottom" data-tooltip="Nueva información">
                                <div class="eva eva-plus"></div>
                            </a>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col m12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Misión</th>
                                        <th>Visión</th>
                                        <th>Macroproceso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @forelse ($informaciones as $informacion)
                                        <tr>
                                            <td>{{ $informacion->id }}</td>
                                            <td>{{ $informacion->nombre }}</td>
                                            <td>{{ $informacion->mision }}</td>
                                            <td>{{ $informacion->vision }}</td>
                                            <td>{{ $informacion->macroproceso }}</td>
                                            <td>
                                                <a href="{{route('informaciones.edit',$informacion->id)}} " class="btn btn-small waves-effect waves-light green">
                                                    Modificar
                                                </a>
                                                <form action="{{route('informaciones.destroy',$informacion->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-small waves-effect waves-light red lighten-1">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
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