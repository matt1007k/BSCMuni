@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m6 offset-m3">
        <a href="{{route('datos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> datos
        </a>
        <div class="card">
            <div class="card-content ">
                <div class="card-title">Editar datos de un año</div>
                <form action="{{route('datos.update', $dato->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.datos.form', [
                        'indicador_id' => $indicador_id,
                        'dato' => $dato,
                    ])
                </form>

            </div>
        </div>

    </div>
</div>
@endsection