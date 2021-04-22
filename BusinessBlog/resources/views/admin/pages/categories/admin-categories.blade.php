@extends('admin.layout.admin-layout')
@section('admnContent')
        <div class="col-lg-10 admin-right d-flex justify-content-around flex-wrap">
            <a href="{{route('categories.create')}}" class="btn btn-primary createPost">Create new Category</a>
                @if($categories)
                    @foreach($categories as $cat)
                        <div class="card admin-posts admin-categories">
                            <div class="card-body">
                                <h5 class="card-title">{{$cat->name}}</h5>
                                <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-primary">Update</a>
                                <form method="POST" action="{{route('categories.destroy',$cat->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
        </div>
@endsection
