@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-around flex-wrap">
        <a href="{{route('tags.create')}}" class="btn btn-primary createPost">Create new Tag</a>
        @if($tags)
            @foreach($tags as $tag)
                <div class="card admin-posts admin-categories">
                    <div class="card-body">
                        <h5 class="card-title">{{$tag->name}}</h5>
                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Update</a>
                        <form method="POST" action="{{route('tags.destroy',$tag->id)}}">
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
