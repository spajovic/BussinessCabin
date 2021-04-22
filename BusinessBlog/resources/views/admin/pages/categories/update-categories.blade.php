@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
        @if($category)
            <div class="createPost postform">
                <form method="POST" action="{{route('categories.update',$category->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="createCategoryName">Category name</label>
                        <input type="text" class="form-control" id="createCategoryName" name="createCategoryName" value="{{$category->name}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        @endif
        <div>
@endsection
