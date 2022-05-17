@extends('layouts.base')
@section('title',  $title)
@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">{{ $title }}</div>
        <div class="panel-body">
            @yield('form')
        </div>
    </section>
@endsection
