<div class="mt-3">
    <div class="justify-content-center">
        <form id='form_edit' action="{{ route('usuarios.update', $usuario) }}">
            @csrf
            <div class="form-group d-flex">
                <input type="text" class="form-control" name="name" placeholder="Nombre Usuario" value="{{ $usuario->name }}" autofocus">
            </div>
            <div class="form-group d-flex">
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico" value="{{ $usuario->email }}">
            </div>
            @if (Auth::user()->rol)
                <div class="form-group">
                    <select class="custom-select" name="rol">
                        <option value="1" {{ $usuario->rol ? 'selected="selected"' : '' }}>Adminstrador</option>
                        <option value="0" {{ $usuario->rol ? '' : 'selected="selected"' }}>Empleado</option>
                    </select>
                </div>
            @endif
            <div class="row">
            @if (Auth::id() == $usuario->id)
                <button type="button" class="btn btn-secondary ml-3 btn_edit_password">Cambiar Clave</button>
            @endif
                <input type="submit" class="btn btn-primary ml-auto mr-3" value="Grabar">
            </div>
        </form>
    </div>
    <div class="form_errors mb-auto mt-3"></div>
</div>