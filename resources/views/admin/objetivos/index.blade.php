@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="h3 text-center">Objetivos Estratégicos</div>
            <div class="w-100 mb-3">
                <a href="{{route('perspectivas.create')}}" class="btn btn-success">
                    Agregar perspectiva
                </a>
            </div>
            <div class="row">
                @if (count($perspectivas) > 0)
                <div class="mb-1">
                    <a href="{{route('objetivos.create')}} " class="btn btn-link">Agregar objetivo</a>
                </div>
                <br>
                @foreach ($perspectivas as $perspectiva)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                            <h4 class="col-md-10">{{ $perspectiva->titulo }}</h4>
                            <div class="col-md d-flex">
                                <a href="{{route('perspectivas.edit',$perspectiva->id)}}" class="btn btn-sm btn-info">
                                    Editar
                                </a>
                                <form action="{{route('perspectivas.destroy',$perspectiva->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="ml-1 btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>

                    
                        <div class="card-body">

                            @forelse ($perspectiva->objetivos as $objetivo)
                            <ul class="list-group">
                                <li class="list-group-item row">                                
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="no-margin">{{$objetivo->slug}}</p>
                                        </div>
                
                                        <div class="col-md-7">
                                            <p>{{$objetivo->contenido}}</p>
                                        </div>
                                        <div class="col-md d-flex">
                                            <a href="{{route('asignarEstrategia',$objetivo->id)}}" class="btn btn-sm btn-dark">
                                                Asignar estrategias
                                            </a>
                                            <a href="{{route('objetivos.edit',$objetivo->id)}} " class="ml-1 btn btn-sm btn-info">
                                                Editar
                                            </a>
                                            <form action="{{route('objetivos.destroy',$objetivo->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="ml-1 btn btn-sm btn-danger">
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
                                    <p>No tiene objetivos...</p>
                                </div>
        
                            </div>
                            @endforelse
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
