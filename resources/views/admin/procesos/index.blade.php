@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md">
                <div class="h4">
                    Macroproceso: 
                    @isset($informacion->macroproceso)
                        {{$informacion->macroproceso}}
                    @else
                        Sin macroproceso....
                    @endisset
                    
                </div>
               
            </div>
            <a href="{{route('procesos.create')}}" class="btn btn-outline-success text-uppercase">
                + proceso
            </a>
        </div>          
        <div class="row">
            @if (count($procesos) > 0)
            <div class="mb-1">
                <a href="{{route('subprocesos.create')}} " class="btn btn-link text-uppercase">Registrar subproceso</a>
            </div> 
            @foreach ($procesos as $proceso)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $proceso->titulo }}</h6>
                            <div class="d-flex">                                    
                                <a href="{{route('procesos.edit',$proceso->id)}} " class="btn btn-outline-info btn-sm">
                                   - Editar 
                                </a>
                                <form action="{{route('procesos.destroy',$proceso->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                        x Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            @forelse ($proceso->subprocesos as $subproceso)
                                <ul class="list-unstyled">
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$subproceso->titulo}}</p>
                                            <div class="d-flex">                                    
                                                <a href="{{route('subprocesos.edit',$subproceso->id)}}" class="btn btn-outline-info btn-sm">
                                                    - Editar
                                                </a>
                                                <form action="{{route('subprocesos.destroy',$subproceso->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                                        x Eliminar
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