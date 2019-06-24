<div class="mt-3">
    <div class="justify-content-center">
        <form id='form_create' action="{{ route('reportes.store') }}">
            @csrf
            <div class="row form-group">
                <label class="col-sm-2 col-form-label font-weight-bold" for="usuario">Autor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext text-muted" id='name' readonly value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group d-flex">
                <input type="date" class="form-control" name="fecha" placeholder="Fecha" autofocus>
            </div>
            <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Descripcion" rows="4" maxlength="400"></textarea>
                <span id="chars">Caracteres Restantes: 400</span>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary ml-auto mr-3" value="Grabar">
            </div>
        </form>
    </div>
    <div class="form_errors mb-auto mt-3"></div>
</div>