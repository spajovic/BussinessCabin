@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
        @if($post)
        <div class="updatePost postform">
            <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="updatePostHeading">Post heading</label>
                    <input type="text" class="form-control" id="updatePostHeading" name="updatePostHeading" value="{{$post->heading}}">
                </div>
                <div class="form-group">
                    <label for="updatePostContent">Post Content</label>
                    <textarea class="form-control" id="updatePostContent" rows="7" name="updatePostContent">{{$post->main_text}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="updatePostCategory" name="updatePostCategory">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($post->kategorija == $category->id) selected @endif >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="updatePostPicture">Upload image</label>
                    <input type="file" class="form-control" id="updatePostPicture" name="updatePostPicture">
                </div>
                <br>
                <label>Tags</label>
                @foreach($tags as $tag)
                <div class="form-check d-flex flex-wrap">
                        <input type="checkbox" class="form-check-input" id="updatePostTags{{$tag->id}}" name="updatePostTags[]" value="{{$tag->id}}"
                        @foreach($post->tagovi as $q)
                            @if($q->id == $tag->id)
                                checked=checked
                            @endif @endforeach >
                        <label class="form-check-label" for="updatePostTags">{{$tag->name}}</label>
                        <br>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        @endif
    <div>
@endsection
