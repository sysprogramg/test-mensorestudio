<div class="row">
    <h3 class="mb-3">Reportes</h3>
</div>
<div class="row form-inline mb-2 justify-content-center">
    <label class="col-form-label font-weight-bold mr-2" for="fecha_desde">Fecha Desde</label>
    <input type="date" class="form-control mb-1 mr-3" id="fecha_desde" value={{ $desde }}>
    <label class="col-form-label font-weight-bold mr-2" for="fecha_hasta">Fecha Hasta</label>
    <input type="date" class="form-control mb-1 mr-3" id="fecha_hasta" value={{ $hasta }}>
    <button class="btn btn-primary mb-1" id='btn_filter_reportes'>Filtrar</button>
</div>
<div class="alerts"></div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Autor</th>
            <th scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reportes as $reporte)
            <tr>
                <td>{{ $reporte->fecha }}</td>
                <td>{{ $reporte->user->name }}</td>
                <td>{{ $reporte->descripcion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<span class="text-muted font-weight-bold">#{{count($reportes) }} registros encontrados</span>