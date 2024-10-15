@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div id="chat" data-user="{{ json_encode($user) }}"></div>
    </div>
@endsection
