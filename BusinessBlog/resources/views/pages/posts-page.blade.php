@extends('layouts.post-page-layout')
@section('naslov') Posts @endsection
@section('leftSide')
    @include('components.post-pages.left-posts')
@endsection
@section('rightSide')
    @include('components.post-pages.right')
@endsection

