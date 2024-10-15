@extends('layouts.app')

@section('content')
    <h1>Hi</h1>
    <div class="mx-4">

        <div id="chat" data-user="{{ json_encode($user) }}"></div>
    </div>
    {{-- <div id="example" /> --}}
@endsection
