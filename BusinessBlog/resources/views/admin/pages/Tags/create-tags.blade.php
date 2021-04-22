@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
        <div class="createPost postform">
            <form method="POST" action="{{route('tags.store')}}">
                @csrf
                <div class="form-group">
                    <label for="createTagName">Tag name</label>
                    <input type="text" class="form-control" id="createTagName" name="createTagName" placeholder="Tag name...">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div>
@endsection
