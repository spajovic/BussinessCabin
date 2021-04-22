@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right d-flex">
        <div class="container subscribers">
            <div class="col-lg-10">
                <h3>Subscribers:</h3>
                @if($subs)
                    @foreach($subs as $sub)
                        <p><b>Email: &nbsp;&nbsp;</b>{{$sub->email}} &nbsp;&nbsp;&nbsp;&nbsp;<b>Time:&nbsp;&nbsp;</b>{{$sub->created_at->format('M, d Y')}}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
