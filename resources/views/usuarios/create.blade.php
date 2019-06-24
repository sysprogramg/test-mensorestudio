<div class="mt-3">
    <div class="justify-content-center">
        <form id='form_create' action="{{ route('usuarios.store') }}">
            @csrf
            <div class="form-group d-flex">
                <input type="text" class="form-control" name="name" placeholder="Nombre Usuario" autofocus>
            </div>
            <div class="form-group d-flex">
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico">
            </div>
            <div class="form-group d-flex position-relative">
                <i class="text-muted fas fa-eye pass-showhide"></i>
                <input type="password" class="form-control" name="password" placeholder="Clave">
            </div>
            <div class="form-group">
                <select class="custom-select" name="rol">
                    <option hidden value="-1">Rol del Usuario</option>
                    <option value="1">Adminstrador</option>
                    <option value="0">Empleado</option>
                </select>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary ml-auto mr-3" value="Grabar">
            </div>
        </form>
    </div>
    <div class="form_errors mb-auto mt-3"></div>
</div>