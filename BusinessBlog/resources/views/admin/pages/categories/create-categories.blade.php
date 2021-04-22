@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-center  align-items-center flex-wrap">
        <div class="createPost postform">
            <form method="POST" action="{{route('categories.store')}}">
                @csrf
                <div class="form-group">
                    <label for="createCategoryName">Category name</label>
                    <input type="text" class="form-control" id="createCategoryName" name="createCategoryName" placeholder="Category name...">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div>
@endsection
