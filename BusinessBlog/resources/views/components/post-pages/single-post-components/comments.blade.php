<!-- Komentari budjavi -->
<div class="blog-comments">
    @if(session()->has('user'))
        <a href="#" class="btn-comment" data-bs-toggle="modal" data-bs-target="#commentModal"> Leave a comment </a>
    @endif
    @if(!session()->has('user'))
        <a href="#" class="btn-comment" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
    @endif
    @if(count($comms) == 0)
        <h4 class="no-comments">No comments...</h4>
    @endif
    @if(count($comms) > 0)
        @if(count($comms) == 1)
            <h4 class="comments-count">{{count($comms)}} &nbsp;Comment</h4>
        @endif
        @if(count($comms) > 1)
            <h4 class="comments-count">{{count($comms)}} &nbsp;Comments</h4>
        @endif
    @foreach($comms as $com)
    <div id="comment-2" class="comment">
        <div class="d-flex">
            <div class="comment-img"><img src="{{asset('storage/img/user-img/'.$com->filename)}}" alt="{{$com->name}}"></div>
            <div>
                <h5><a href="">{{$com->name.' '.$com->surname}}</a></h5>
                <time datetime="{{$com->created_at}}">{{$com->created_at->format('M, d Y')}}</time>
                <p>
                    {{$com->comment}}
                </p>
            </div>
        </div>
    @endforeach
{{--        <div id="comment-reply-1" class="comment comment-reply">--}}
{{--            <div class="d-flex">--}}
{{--                <div class="comment-img"><img src="{{asset('assets/img/profilna.jpg')}}" alt=""></div>--}}
{{--                <div>--}}
{{--                    <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class='bx bx-reply'></i></i> Reply</a></h5>--}}
{{--                    <time datetime="2020-01-01">01 Jan, 2020</time>--}}
{{--                    <p>--}}
{{--                        Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.--}}

{{--                        Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.--}}

{{--                        Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div id="comment-reply-2" class="comment comment-reply">--}}
{{--                <div class="d-flex">--}}
{{--                    <div class="comment-img"><img src="{{asset('assets/img/profilna.jpg')}}" alt=""></div>--}}
{{--                    <div>--}}
{{--                        <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class='bx bx-reply'></i></i> Reply</a></h5>--}}
{{--                        <time datetime="2020-01-01">01 Jan, 2020</time>--}}
{{--                        <p>--}}
{{--                            Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div><!-- End comment reply #2-->--}}
{{--        </div><!-- End comment reply #1-->--}}
    <!-- End comment #2-->
    </div>
    @endif
</div>
