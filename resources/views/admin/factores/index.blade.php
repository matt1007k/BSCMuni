@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md">
                <div class="h3 text-center">
                    Las 5 fuerzas de porter
                </div>
                <a href="{{route('fuerzas.create')}}" class="btn btn-success">
                    Agregar fuerza
                </a>
            </div>
        </div>          
        <div class="row">
            @if (count($fuerzas) > 0)
            <div class="mb-1">
                <a href="{{route('factores.create')}} " class="btn btn-link">Agregar factor</a>
            </div> 
                @foreach ($fuerzas as $fuerza)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-md-10">  
                                <h6 class="h5">{{ $fuerza->titulo }}</h6>
                            </div>
                            <div class="col-md d-flex">                                    
                                <a href="{{route('fuerzas.edit',$fuerza->id)}} " class="btn btn-info btn-sm">
                                   Editar 
                                </a>
                                <form action="{{route('fuerzas.destroy',$fuerza->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            @forelse ($fuerza->factores as $factor)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">                                
                                            <div class="col-md-9">
                                                <p>{{$factor->titulo}}</p>
                                            </div>
                                            <div class="col-md d-flex">                                    
                                                <a href="{{route('factores.edit',$factor->id)}}" class="btn btn-info btn-sm">
                                                    Editar
                                                </a>
                                                <form action="{{route('factores.destroy',$factor->id)}}" method="post">
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
                                        <p>No tiene factores...</p>
                                    </div>
                                    
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                   
                    
                </div>
                @endforeach
                <div class="w-100 text-center">
                    {{ $fuerzas->links() }}
                </div>
            @else
                <h4 class="w-100 text-center text-bold">No hay ningún registro!!!</h4>
            @endif
        </div>
    </div>
@endsection