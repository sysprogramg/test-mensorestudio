<div class="mt-3">
    <div class="justify-content-center">
        <form id='form_edit' action="{{ route('reportes.update', $reporte) }}">
            @csrf
            <div class="form-group d-flex">
                <input type="date" class="form-control" name="fecha" placeholder="Fecha" value={{ $reporte->fecha }} autofocus>
            </div>
            <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Descripcion" rows="4">{{ $reporte->descripcion }}</textarea>
                <span id="chars">Caracteres Restantes: {{ 400 - $len }}</span>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary ml-auto mr-3" value="Grabar">
            </div>
        </form>
    </div>
    <div class="form_errors mb-auto mt-3"></div>
</div>