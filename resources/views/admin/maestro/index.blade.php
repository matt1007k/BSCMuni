@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="row">
            <div class="col m12 d-flex justify-center align-items-center">
                <h5>Maestro</h5>
            </div>
        </div>
        <div class="row">
            <div class="col m6 offset-m4">
                <form action="{{route('maestro.index')}}" method="get">
                    <div class="row">
                        <div class="input-field col m8">
                            <select name="perspectiva" id="perspectiva">
                                @forelse ($perspectivas as $perspectiva)
                                <option value="{{$perspectiva->slug}}" {{$perspectiva->slug === $perspectivaObjetivos->slug 
                                        ? 'selected' : ''}}>{{$perspectiva->titulo}}
                                </option>
                                @empty
                                <option value="">No hay perspectiva</option>
                                @endforelse
                            </select>
                            <label>Seleccione la perspectiva</label>
                        </div>
                        <div class="input-field col m8">
                            <select name="anio_anterior" id="anio_anterior">
                                <option value="">Seleccionar el año anterior</option>
                                <option value="2023" @isset($anio_anterior) {{ $anio_anterior == 2023 ? 'selected' : '' }} @endisset>2023</option>
                                <option value="2022" @isset($anio_anterior) {{ $anio_anterior == 2022 ? 'selected' : '' }} @endisset>2022</option>
                                <option value="2021" @isset($anio_anterior) {{ $anio_anterior == 2021 ? 'selected' : '' }} @endisset>2021</option>
                                <option value="2020" @isset($anio_anterior) {{ $anio_anterior == 2020 ? 'selected' : '' }} @endisset>2020</option>
                                <option value="2019" @isset($anio_anterior) {{ $anio_anterior == 2019 ? 'selected' : '' }} @endisset>2019</option>
                                <option value="2018" @isset($anio_anterior) {{ $anio_anterior == 2018 ? 'selected' : '' }} @endisset>2018</option>
                                <option value="2017" @isset($anio_anterior) {{ $anio_anterior == 2017 ? 'selected' : '' }} @endisset>2017</option>
                            </select>
                            <label for="anio_anterior">El año anterior</label>
                        </div>
                        <div class="input-field col m8">
                            <select name="anio_actual" id="anio_actual">
                                <option value="">Seleccionar el año actual</option>
                                <option value="2023" @isset($anio_actual) {{ $anio_actual == 2023 ? 'selected' : '' }} @endisset>2023</option>
                                <option value="2022" @isset($anio_actual) {{ $anio_actual == 2022 ? 'selected' : '' }} @endisset>2022</option>
                                <option value="2021" @isset($anio_actual) {{ $anio_actual == 2021 ? 'selected' : '' }} @endisset>2021</option>
                                <option value="2020" @isset($anio_actual) {{ $anio_actual == 2020 ? 'selected' : '' }} @endisset>2020</option>
                                <option value="2019" @isset($anio_actual) {{ $anio_actual == 2019 ? 'selected' : '' }} @endisset>2019</option>
                                <option value="2018" @isset($anio_actual) {{ $anio_actual == 2018 ? 'selected' : '' }} @endisset>2018</option>
                                <option value="2017" @isset($anio_actual) {{ $anio_actual == 2017 ? 'selected' : '' }} @endisset>2017</option>
                            </select>
                            <label for="anio_actual">El año actual</label>
                        </div>
                        <div class="input-field col m8">
                            <select name="semaforo" id="semaforo">
                                <option value="">Seleccionar el año</option>
                                <option value="2023" @isset($semaforo) {{ $semaforo == 2023 ? 'selected' : '' }} @endisset>2023</option>
                                <option value="2022" @isset($semaforo) {{ $semaforo == 2022 ? 'selected' : '' }} @endisset>2022</option>
                                <option value="2021" @isset($semaforo) {{ $semaforo == 2021 ? 'selected' : '' }} @endisset>2021</option>
                                <option value="2020" @isset($semaforo) {{ $semaforo == 2020 ? 'selected' : '' }} @endisset>2020</option>
                                <option value="2019" @isset($semaforo) {{ $semaforo == 2019 ? 'selected' : '' }} @endisset>2019</option>
                                <option value="2018" @isset($semaforo) {{ $semaforo == 2018 ? 'selected' : '' }} @endisset>2018</option>
                                <option value="2017" @isset($semaforo) {{ $semaforo == 2017 ? 'selected' : '' }} @endisset>2017</option>
                            </select>
                            <label for="semaforo">El año</label>
                        </div>
                    </div>
                    <div>
                        <button class="btn" type="submit">Filtar</button>
                    </div>
                </form>
            </div>
        </div>

        @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('admin.maestro.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
            ])
            @else
            <div>No existe esta perspectiva.</div>

            @endif

        @else
        <div>No hay perspectivas registradas.</div>

        @endif


    </div>
</div>
@endsection