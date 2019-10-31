@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Factores Clave del Exito vs Capacidades Medulares</h3>
            <div class="card">
                <div class="card-body">

                    <table class="w-100 table table-responsive  table-bordered">
                        <thead class="text-center font-weight-bold">
                            <tr>
                                <td rowspan="3" style="vertical-align: bottom">Factores</td>
                                <td colspan="6" class="bg-info text-white">Desempeno de capacidades vs FCE</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="bg-danger text-white">Inferior</td>
                                <td colspan="2" class="bg-primary text-white">Igual</td>
                                <td colspan="2" class="bg-success text-white">Superior</td>
                            </tr>
                            <tr>
                                <td class="bg-danger text-white">FCE</td>
                                <td class="bg-danger text-white">Capacidades</td>
                                <td class="bg-primary text-white">FCE</td>
                                <td class="bg-primary text-white">Capacidades</td>
                                <td class="bg-success text-white">FCE</td>
                                <td class="bg-success text-white">Capacidades</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($actividades as $actividad)
                            @if($actividad->alta != 0 && $actividad->bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td class="text-danger text-center">Alta</td>
                                <td class="bg-danger text-white text-center">Bueno</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>
                            @elseif($actividad->alta != 0 && $actividad->muy_bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td colspan="2"></td>
                                <td class="text-primary text-center">Alta</td>
                                <td class="bg-primary text-white text-center">Muy Bueno</td>
                                <td colspan="2"></td>
                            </tr>
                            @elseif($actividad->alta != 0 && $actividad->deficiente != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td class="text-danger text-center">Alta</td>
                                <td class="bg-danger text-white text-center">Deficiente</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>
                            @elseif($actividad->alta != 0 && $actividad->muy_deficiente != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td class="text-danger text-center">Alta</td>
                                <td class="bg-danger text-white text-center">Muy Deficiente</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>

                            @elseif($actividad->media != 0 && $actividad->muy_bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td class="text-success text-center">Medio</td>
                                <td class="bg-success text-white text-center">Muy Bueno</td>
                            </tr>
                            @elseif($actividad->media != 0 && $actividad->bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td colspan="2"></td>
                                <td class="text-primary text-center">Medio</td>
                                <td class="bg-primary text-white text-center">Bueno</td>
                                <td colspan="2"></td>
                            </tr>
                            @elseif($actividad->media != 0 && $actividad->deficiente != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td class="text-danger text-center">Medio</td>
                                <td class="bg-danger text-white text-center">Deficiente</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>
                            @elseif($actividad->media != 0 && $actividad->muy_deficiente != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td class="text-danger text-center">Medio</td>
                                <td class="bg-danger text-white text-center">Muy Deficiente</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>

                            @elseif($actividad->baja != 0 && $actividad->muy_bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td class="text-success text-center">Baja</td>
                                <td class="bg-success text-white text-center">Muy Bueno</td>
                            </tr>
                            @elseif($actividad->baja != 0 && $actividad->bueno != 0)
                            <tr>
                                <td class="w-50">{{ $actividad->titulo }}</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td class="text-success text-center">Baja</td>
                                <td class="bg-success text-white text-center">Bueno</td>
                            </tr>
                            @elseif($actividad->baja != 0 && $actividad->deficiente != 0)
                            @elseif($actividad->baja != 0 && $actividad->muy_deficiente != 0)
                            @endif


                            @empty
                            <tr>
                                <td>No hay actividades registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection