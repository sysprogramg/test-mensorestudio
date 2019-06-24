@extends('layouts.app')
@section('title', 'Panel Usuario')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{URL::to('/')}}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('partials._modal_form')
    <div class="row mt-2 mb-5">
        <button class="btn btn-secondary position-absolute ml-3" id="btn_list" data-path="{{ route('reportes.filter') }}">Listar Reportes</button>
        <div id="user_menu" class="ml-auto mr-3">
            @include('partials._menu')
        </div>        
    </div>
    <div id="table">
        @include('partials.usuarios._index')
    </div>
    @section('script')
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @endsection
@endsection