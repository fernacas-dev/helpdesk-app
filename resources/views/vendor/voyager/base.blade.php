@extends('voyager::master')
@section('css')
    @vite('resources/css/app.css')
@endsection

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')

        <div id="example"></div>
    </div>
@stop

@section('javascript')
    @vite('resources/js/app.js')
@stop
