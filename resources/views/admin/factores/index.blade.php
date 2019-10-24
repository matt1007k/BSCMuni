@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-md">
                <div class="h4">Las 5 fuerzas de porter</div>
            </div>
            <a href="{{route('fuerzas.create')}}" class="btn btn-outline-success text-uppercase">
                + fuerza
            </a>
        </div>          
        <p class=" mb-3">Factores externos que afectan a la empresa.</p>
        <div class="row">
            @if (count($fuerzas) > 0)
            <div class="mb-1">
                <a href="{{route('factores.create')}} " class="btn btn-link text-uppercase">Registrar factor</a>
            </div> 
            @foreach ($fuerzas as $fuerza)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white d-flex justify-content-between">
                            
                            <h6 class="h5">{{ $fuerza->titulo }}</h6>
                            <div class="d-flex">                                    
                                <a href="{{route('fuerzas.edit',$fuerza->id)}} " class="btn btn-outline-info btn-sm">
                                   - Editar 
                                </a>
                                <form action="{{route('fuerzas.destroy',$fuerza->id)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                        x Eliminar
                                    </button>
                                </form>
                            </div> 
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled no-margin">
                                @forelse ($fuerza->factores as $factor)
                                    <li class="pt-1 pb-1">
                                        <div class="d-flex justify-content-between"> 
                                            <p class="no-margin">- {{$factor->titulo}}</p>
                                            <div class="d-flex">                                    
                                                <a href="{{route('factores.edit',$factor->id)}}" class="btn btn-outline-info btn-sm">
                                                    - Editar
                                                </a>
                                                <form action="{{route('factores.destroy',$factor->id)}}" method="post">
                                                    @csrf    
                                                    @method('delete')
                                                    <button type="submit" class="ml-1 btn btn-outline-danger btn-sm">
                                                        x Eliminar
                                                    </button>
                                                </form>
                                            </div>  
                                            
                                        </div>
                                    </li>
                                    @empty
                                    <li>
                                        <p class="no-margin">No tiene factores.</p>
                                    </li> 
                                @endforelse
                            </ul>
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