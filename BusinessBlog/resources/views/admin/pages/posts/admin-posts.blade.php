@extends('admin.layout.admin-layout')
@section('admnContent')
    @if($posts)
        <div class="col-lg-10 admin-right d-flex justify-content-around flex-wrap">
        <a href="{{route('posts.create')}}" class="btn btn-primary createPost">Create new post</a>
        @foreach($posts as $post)

                <div class="card admin-posts" style="width: 18rem;">
                    <img src="{{asset('storage/img/posts-img/'.$post->filename)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->heading}}</h5>
                        <p class="card-text">{{substr($post->main_text,0,55).'...'}}</p>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Update</a>
                        <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
        @endforeach
        </div>
    @endif
@endsection
