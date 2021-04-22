@extends('admin.layout.admin-layout')
@section('admnContent')
    <div class="col-lg-10 admin-right">
        <h2>Loginfo</h2>
        @if($data)
            <h4>Filesize : <b>{{round($data['filesize']/1024)}} KB</b></h4>
            <pre>{{$data['file']}}</pre>
        @endif
    </div>
@endsection
