@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex justify-content-around flex-wrap">
        <div class="container-fluid">
            @if($comments)
                @foreach($comments as $comms)
                    <div class="col-lg-8 admin-comments">
                        <div class="card">
                            <h5 class="card-header">{{$comms->heading}}</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{$comms->name.' '.$comms->surname}}</h5>
                                <p class="card-text">{{$comms->comment}}</p>
                                <form method="POST" action="{{route('comments.destroy',$comms->comment_id)}}">
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
