<div class="row">
    <h3 class="mb-3">Usuarios</h3>
    <div class="ml-auto mr-3">
        <button class="btn btn-success" id="btn_create_usuario" data-path="{{ route('usuarios.create') }}">
            Nuevo Usuario
        </button>
    </div>
</div>
<div class="alerts"></div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Perfil</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->usuario }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ ($usuario->administrador) ? "Administrador" : "Empleado" }}</td>
                <td>
                    <div class="float-right">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-sm btn-primary fas fa-edit btn_edit_usuario"></a>
                        <a href="{{ route('usuarios.destroy', $usuario->id) }}" class="btn-sm btn-danger fas fa-trash btn_delete_usuario"></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<span class="text-muted font-weight-bold">#{{count($usuarios) }} registros encontrados</span>