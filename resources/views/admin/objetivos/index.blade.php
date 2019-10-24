@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row d-flex justify-content-between">
                <div class="h3 text-center">Perspectivas y sus objetivos Estratégicos</div>
                <a href="{{route('perspectivas.create')}}" class="btn btn-outline-success text-uppercase">
                    + perspectiva
                </a>
            </div>
            <div class="row">
                @if (count($perspectivas) > 0)
                <div class="mb-1">
                    <a href="{{route('objetivos.create')}} " class="btn btn-link text-uppercase">Registrar objetivo</a>
                </div>
                <br>
                @foreach ($perspectivas as $perspectiva)
                <div class="col-md-12 mb-2">
                    <div class="card border-dark">
                        <div class="card-header d-flex justify-content-between bg-dark">
                            <h4 class="text-white no-margin">{{ $perspectiva->titulo }}</h4>
                            <div class="d-flex">
                                <a href="{{route('perspectivas.edit',$perspectiva->id)}}" class="btn btn-sm btn-outline-info text-uppercase">
                                    - Editar
                                </a>
                                <form action="{{route('perspectivas.destroy',$perspectiva->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="ml-1 btn btn-sm btn-outline-danger text-uppercase">
                                        x Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>

                    
                        <div class="card-body">

                            <ul class="list-unstyled no-margin">
                            @forelse ($perspectiva->objetivos as $objetivo)
                                <li class="d-flex justify-content-between pt-2 pb-2"> 
                                    <div>
                                        <span class="no-margin pr-2 font-weight-bold">{{$objetivo->slug}}:</span>                        
                                        <span class="no-margin text-left">{{$objetivo->contenido}}</span>                                        
                                    </div>  
                                    <div class="d-flex">                                            
                                        <a href="{{route('objetivos.edit',$objetivo->id)}}" class="ml-1 btn btn-sm btn-outline-info text-uppercase">
                                            - Editar
                                        </a>
                                        <form action="{{route('objetivos.destroy',$objetivo->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="ml-1 btn btn-sm btn-outline-danger text-uppercase">
                                                x Eliminar
                                            </button>
                                        </form>
                                    </div>
                
                                </li>
                                @empty
                                <li>
                                    <p class="no-margin">No tiene objetivos...</p>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="w-100 text-center">
                    {{ $perspectivas->links() }}
                </div>
                @else
                    <h4 class="text-bold">No hay ningún registro!!!</h4>
                @endif
            </div>
    
        </div>
    </div>
</div>
@endsection
