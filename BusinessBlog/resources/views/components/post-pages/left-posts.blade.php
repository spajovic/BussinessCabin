<!-- BLOGCINA -->

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <!-- Leva strana braski moi -->
            <div class="col-lg-8 entries">
                <!-- Post -->
                @if($posts)
                    @foreach($posts as $post)
                        <div class="entry">
                            <div class="entry-img">
                                <img src="{{asset('storage/img/posts-img/'.$post->filename)}}" alt="Baby yoda" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="{{route('posts.show',$post->id)}}">{{$post->heading}}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class='bx bx-calendar-week'></i><a href="#"><time datetime="{{$post->created_at}}">{{$post->created_at->format('M, d Y')}}</time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>
                                    {{substr($post->main_text,0,220).'...'}}
                                </p>
                                <div class="read-more">
                                    <a href="{{route('posts.show',$post->id)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
                <!-- Kraj Post -->
                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        @for($x = 1; $x <= $posts->lastPage(); $x++)
                            <li @if($posts->currentPage() == $x)class="active" @endif><a href="{{$posts->path()}}?page={{$x}}">{{$x}}</a></li>
                        @endfor
                    </ul>
                </div>
            </div>

            <!-- Kraj leve strani braski moi -->
