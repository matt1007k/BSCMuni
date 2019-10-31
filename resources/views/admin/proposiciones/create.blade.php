@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card border-dark">
            <div class="card-header bg-dark text-white text-center h3">Registrar proposición</div>
            <div class="card-body ">

                <form action="{{route('proposiciones.store')}}" method="POST">
                    @include('admin.proposiciones._form', ['btnT' => 'Registrar'])
                </form>
            </div>
        </div>
        <a href="{{route('proposiciones.index')}}" class="btn btn-link text-uppercase">
            <- Ir a proposición de valor </a> </div> </div> @endsection