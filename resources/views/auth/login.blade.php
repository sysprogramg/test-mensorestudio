@extends('layouts.app')
@section('title', 'Acceso al Sistema')
@section('pageClass', 'login')
@section('css')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login_card">
            <div class="justify-content-center">
                <div class="top_card">
                    <h3>Acceso al Sistema</h3> 
                </div>
                <form id="form_login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex mb-4">
                        <input class="form-control" type="text" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autofocus>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="d-flex mb-2 position-relative">
                        <i class="text-muted fas fa-eye pass-showhide"></i>
                        <input class="form-control" type="password" name="password" placeholder="Clave" value="{{ old('password') }}" required>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="d-flex mb-1 ml-5">
                            <input class="form-check-input" type="checkbox" name="remember_token" id="remember_token" {{ old('remember_token') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember_token">Recordarme</label>
                    </div>
                    <div class="d-flex mt-3">
                        <input type="submit" class='btn btn-primary w-100' value="Ingresar">
                    </div>
                    <div class="d-flex mt-3">
                        <a class="text-decoration-none btn_register_usuario" href="{{ route('register') }}">Registrar Nuevo Usuario</a>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="footer_card errors">
                        <h6><i class="fas fa-exclamation-circle mr-2"></i>Las credenciales no coinciden con nuestros registros.</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @section('script')
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @endsection
</div>
@endsection
