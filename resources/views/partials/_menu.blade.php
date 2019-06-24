<div class="dropdown">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuUsuario" data-toggle="dropdown" aria-haspopup="true" 
        aria-expanded="false">{{ Auth::user()->name }}</button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuUsuario">
        <button class="dropdown-item btn_edit" data-path="{{ route('usuarios.edit', Auth::user()) }}" data-title="Editar Usuario"'>
            <i class="fas fa-edit mr-1"></i>Editar
        </button>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item"><i class="fas fa-sign-out-alt mr-1"></i>Salir</button>
        </form>
    </div>
</div>