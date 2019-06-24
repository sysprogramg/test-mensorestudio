<div class="mb-3">
    <div class="row">
        <h3 class="mb-3">Mis Reportes</h3>
        <div class="ml-auto mr-3">
            <button class="btn btn-success btn_create" data-path="{{ route('reportes.create') }}" data-title="Nuevo Reporte">
                Nuevo Reporte
            </button>
        </div>
    </div>
    <div class="alerts"></div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Descripcion</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->fecha }}</td>
                    <td>{{ $reporte->descripcion }}</td>
                    <td>
                        <div class="float-right">
                        <button class="btn btn-primary btn-sm btn_edit" data-path="{{ route('reportes.edit', $reporte) }}" 
                                data-title="Editar Reporte"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm btn_delete" data-path="{{ route('reportes.destroy', $reporte) }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="text-muted font-weight-bold">#{{count($reportes) }} registros encontrados</span>
</div>