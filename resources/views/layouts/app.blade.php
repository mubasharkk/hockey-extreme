@extends('layouts.base')


@section('page-content')
    <div class="container">
        <h2>{{config('app.name')}}</h2>
        <hr/>
        @yield('content')
    </div>

@endsection