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
                    <h3>Registrar Nuevo Usuario</h3> 
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" name="name" placeholder="Nombre Usuario" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group d-flex">
                        <input type="email" class="form-control" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <div class="d-flex mb-3 position-relative">
                        <i class="text-muted fas fa-eye pass-showhide"></i>
                        <input type="password" class="form-control" name="password" placeholder="Clave" required>
                    </div>
                    <input type="hidden" name="rol" value="0">
                    <div class="row">
                        <a href="{{ route('login') }}" class="btn btn-secondary ml-3"><i class="fas fa-chevron-left"></i></a>
                        <input type="submit" class="btn btn-primary ml-auto mr-3" value="Grabar">
                    </div>
                </form>
                @if ($errors->any()) 
                    <div class="form_errors">
                        <div class="alert alert-danger alert-dismissible fade show text-muted" role="alert">
                            <strong><i class="fas fa-exclamation-circle mr-2"></i>Se produjeron los siguientes errores:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
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