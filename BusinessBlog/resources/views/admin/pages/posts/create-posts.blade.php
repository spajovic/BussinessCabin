@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
            <div class="updatePost postform">
                <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="createPostHeading">Post heading</label>
                        <input type="text" class="form-control" id="createPostHeading" name="createPostHeading" placeholder="Heading...">
                    </div>
                    <div class="form-group">
                        <label for="createPostContent">Post Content</label>
                        <textarea class="form-control" id="createPostContent" rows="7" name="createPostContent" placeholder="Content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="createPostCategory" name="createPostCategory">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="createPostPicture">Upload image</label>
                        <input type="file" class="form-control" id="createPostPicture" name="createPostPicture">
                    </div>
                    <br>
                    <label>Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check d-flex flex-wrap">
                            <input type="checkbox" class="form-check-input" id="createPostTags{{$tag->id}}" name="createPostTags[]" value="{{$tag->id}}">
                            <label class="form-check-label" for="createPostTags">{{$tag->name}}</label>
                            <br>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
    </div>
@endsection
