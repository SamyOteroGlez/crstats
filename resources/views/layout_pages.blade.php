@extends('layout')

@section('header')

    @include('_banner')

@stop

@section('body')

    @yield('content_pages')

@stop
