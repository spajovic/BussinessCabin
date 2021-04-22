@extends('layouts.layout')
@section('title') Posts @endsection
@section('content')
    <main id="main">
        @include('components.post-pages.header')
        @yield('leftSide')
        @yield('rightSide')
    </main>
@endsection
