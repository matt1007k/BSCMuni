<!-- Modal -->
<div class="modal fade" id="modalFiltrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title text-center" id="modalFiltrar">Filtrar por años</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('maestro.index')}}" method="get">
            <div class="modal-body">  
                <input type="hidden" name="perspectiva" value="{{ $perspectivaObjetivos->slug }}">
                <div class="form-group">
                    <label for="anio_anterior">Valor anterior</label>
                    <select name="anio_anterior" id="anio_anterior" class="form-control">
                        <option value="">Seleccionar el valor anterior</option>
                        <option value="2023" @isset($anio_anterior) {{ $anio_anterior == 2023 ? 'selected' : '' }} @endisset>2023</option>
                        <option value="2022" @isset($anio_anterior) {{ $anio_anterior == 2022 ? 'selected' : '' }} @endisset>2022</option>
                        <option value="2021" @isset($anio_anterior) {{ $anio_anterior == 2021 ? 'selected' : '' }} @endisset>2021</option>
                        <option value="2020" @isset($anio_anterior) {{ $anio_anterior == 2020 ? 'selected' : '' }} @endisset>2020</option>
                        <option value="2019" @isset($anio_anterior) {{ $anio_anterior == 2019 ? 'selected' : '' }} @endisset>2019</option>
                        <option value="2018" @isset($anio_anterior) {{ $anio_anterior == 2018 ? 'selected' : '' }} @endisset>2018</option>
                        <option value="2017" @isset($anio_anterior) {{ $anio_anterior == 2017 ? 'selected' : '' }} @endisset>2017</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="anio_actual">Valor actual</label>
                    <select name="anio_actual" id="anio_actual" class="form-control">
                        <option value="">Seleccionar el valor actual</option>
                        <option value="2023" @isset($anio_actual) {{ $anio_actual == 2023 ? 'selected' : '' }} @endisset>2023</option>
                        <option value="2022" @isset($anio_actual) {{ $anio_actual == 2022 ? 'selected' : '' }} @endisset>2022</option>
                        <option value="2021" @isset($anio_actual) {{ $anio_actual == 2021 ? 'selected' : '' }} @endisset>2021</option>
                        <option value="2020" @isset($anio_actual) {{ $anio_actual == 2020 ? 'selected' : '' }} @endisset>2020</option>
                        <option value="2019" @isset($anio_actual) {{ $anio_actual == 2019 ? 'selected' : '' }} @endisset>2019</option>
                        <option value="2018" @isset($anio_actual) {{ $anio_actual == 2018 ? 'selected' : '' }} @endisset>2018</option>
                        <option value="2017" @isset($anio_actual) {{ $anio_actual == 2017 ? 'selected' : '' }} @endisset>2017</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="semaforo">El semáforo (año a comparar)</label>
                    <select name="semaforo" id="semaforo" class="form-control">
                        <option value="">Seleccionar el semáforo</option>
                        <option value="2023" @isset($semaforo) {{ $semaforo == 2023 ? 'selected' : '' }} @endisset>2023</option>
                        <option value="2022" @isset($semaforo) {{ $semaforo == 2022 ? 'selected' : '' }} @endisset>2022</option>
                        <option value="2021" @isset($semaforo) {{ $semaforo == 2021 ? 'selected' : '' }} @endisset>2021</option>
                        <option value="2020" @isset($semaforo) {{ $semaforo == 2020 ? 'selected' : '' }} @endisset>2020</option>
                        <option value="2019" @isset($semaforo) {{ $semaforo == 2019 ? 'selected' : '' }} @endisset>2019</option>
                        <option value="2018" @isset($semaforo) {{ $semaforo == 2018 ? 'selected' : '' }} @endisset>2018</option>
                        <option value="2017" @isset($semaforo) {{ $semaforo == 2017 ? 'selected' : '' }} @endisset>2017</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
            </div>
            </form>
        </div>
    </div>
</div>