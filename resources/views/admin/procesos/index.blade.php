@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md">
                <div class="h3 text-center">
                    Macroproceso: 
                    @isset($informacion->macroproceso)
                        {{$informacion->macroproceso}}
                    @else
                        Sin macroproceso....
                    @endisset
                    
                </div>
                <a href="{{route('procesos.create')}}" class="btn btn-success">
                    Agregar proceso
                </a>
            </div>
        </div>          
        <div class="row">
            @if (count($procesos) > 0)
            <div class="mb-1">
                <a href="{{route('subprocesos.create')}} " class="btn btn-link">Agregar subproceso</a>
            </div> 
                @foreach ($procesos as $proceso)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-md-10">  
                                <h6 class="h5">{{ $proceso->titulo }}</h6>
                            </div>
                            <div class="col-md d-flex">                                    
                                <a href="{{route('procesos.edit',$proceso->id)}} " class="btn btn-info btn-sm">
                                   Editar 
                                </a>
                                <form action="{{route('procesos.destroy',$proceso->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            @forelse ($proceso->subprocesos as $subproceso)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">                                
                                            <div class="col-md-9">
                                                <p>{{$subproceso->titulo}}</p>
                                            </div>
                                            <div class="col-md d-flex">                                    
                                                <a href="{{route('subprocesos.edit',$subproceso->id)}}" class="btn btn-info btn-sm">
                                                    Editar
                                                </a>
                                                <form action="{{route('subprocesos.destroy',$subproceso->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>  
                                            
                                        </div>
                                    </li>
                                </ul>
                            @empty
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <p>No tiene subprocesos...</p>
                                    </div>
                                    
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                   
                    
                </div>
                @endforeach
                <div class="w-100 text-center">
                    {{ $procesos->links() }}
                </div>
            @else
                <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
            @endif
        </div>
    </div>
        
@endsection