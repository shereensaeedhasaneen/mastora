<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{config('app.name')}}">
    <meta name="keyword" content="{{config('app.name')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon.ico>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ mix('/css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>


<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    @include('includes.nav-builder')
    @include('includes.header')
    <div class="c-body">
        <div class="container">
            @include('includes.error')
            @include('includes.success')
        </div>
        <main class="c-main">
            <div class="container">
                @include('includes.spatie-flash-messages')
            </div>
            
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('js/coreui-utils.js') }}"></script>
<script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
@yield('javascript')
@yield('javascript_secondary')
</body>
</html>
