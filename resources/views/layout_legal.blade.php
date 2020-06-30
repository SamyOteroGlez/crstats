@extends('layout')

@section('css')

    <link rel="stylesheet" href="{{ asset('/css/legal.css') }}">

@stop

@section('body')

    @yield('content_pages')

@stop
