@extends('voyager::master')
@section('css')
    @vite('resources/css/app.css')
@endsection


@section('javascript')
    @viteReactRefresh
    @vite('resources/js/app.js')
@endsection
