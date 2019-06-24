<div class="mb-3">
    <div class="row">
        <h3 class="mb-3">Usuarios</h3>
        <div class="ml-auto mr-3">
            <button class="btn btn-success btn_create" data-path="{{ route('usuarios.create') }}" data-title='Nuevo Usuario'>
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
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ ($usuario->rol) ? "Administrador" : "Empleado" }}</td>
                    <td>
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm btn_edit" data-path="{{ route('usuarios.edit', $usuario) }}" 
                                data-title="Editar Usuario"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm btn_delete" data-path="{{ route('usuarios.destroy', $usuario) }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="text-muted font-weight-bold">#{{count($usuarios) }} registros encontrados</span>
</div>