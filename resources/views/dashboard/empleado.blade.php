@extends('layouts.app')
@section('title', 'Panel Usuario')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('partials._modal_form')
    <div class="row mt-2 mb-5">
        <div id="user_menu" class="ml-auto mr-3">    
            @include('partials._menu')
        </div>
    </div>
    <div id="table">
        @include('partials.reportes._index')
    </div>
    @section('script')
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @endsection
@endsection