<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <!-- Leva strana braski moi -->
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    @if($post)
                    <!-- Post slika -->
                    <div class="entry-img">
                        <img src="{{asset('storage/img/posts-img/'.$post->filename)}}" alt="" class="img-fluid">
                    </div>
                    <!-- Kraj slidze -->
                    <!-- Naslov posta -->
                    <h2 class="entry-title">
                        <a href="{{route('posts.show',$post->id)}}">{{$post->heading}}</a>
                    </h2>
                    <!-- Kraj naslova -->
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class='bx bx-user'></i><a href="#">{{$post->autor->name.' '.$post->autor->surname}}</a></li>
                            <li class="d-flex align-items-center"><i class='bx bx-calendar-week'></i><a href="#"><time datetime="{{$post->created_at}}">{{$post->created_at->format('M, d Y')}}</time></a></li>
                            <li class="d-flex align-items-center"><i class='bx bx-comment-detail'></i> <a href="#">{{$post->brojkomentara}} Comments</a></li>
                        </ul>
                    </div>
                    <!-- Tagiciii -->
                    <!-- Kontent -->
                    <div class="entry-content">
                        <p>
                            {{$post->main_text}}
                        </p>
                    </div>
                    <!-- Kraj Kontenta -->
                    <!-- Post footer -->
                    <div class="entry-footer">
                        <i class='bx bx-folder'></i>
                        <ul class="cats">
                            <li><a href="#">{{$post->category_name}}</a></li>
                        </ul>
                        <i class='bx bx-purchase-tag'></i>
                        <ul class="tags">
                            @foreach($post->tagnames as $tag)
                            <li><a href="#">{{$tag->name}},</a></li>
                            @endforeach
                        </ul>
                    </div>
                        @endif
                </article>

                <!-- Autor ovog Bloga -->
                @include('components.post-pages.single-post-components.author',['author' => $post->autor ])
                <!-- Kraj autora -->

                @include('components.post-pages.single-post-components.comments',['comms'=>$post->comms])
            </div>
        </div>
    </div>
</section>
@if($post)
@include('components.modals.comment-modal',['id' => $post->id])
@endif

            <!-- Kraj leve strane -->
