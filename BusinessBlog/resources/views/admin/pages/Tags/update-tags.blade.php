@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
        @if($tag)
        <div class="createPost postform">
            <form method="POST" action="{{route('tags.update',$tag->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="updateTagName">Tag name</label>
                    <input type="text" class="form-control" id="updateTagName" name="updateTagName" value="{{$tag->name}}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        @endif
        <div>
@endsection
