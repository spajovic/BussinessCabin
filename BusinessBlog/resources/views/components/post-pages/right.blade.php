<!-- Desna strana  -->
<div class="col-lg-4 desno">
    <div class="sidebar">
        <!-- Search -->
        <h3 class="sidebar-title">Search Post</h3>
        <div class="sidebar-item search-form">
            <form action="#">
                <input type="text" name="searchTxt" id="searchTxt" placeholder="Search...">
                <button type="button" id="searchBtn" name="searchBtn"><i class='bx bx-search'></i></button>
            </form>
        </div>
        <!-- Kraj Search -->

        <!-- Categories -->
        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                @if($categories)
                    @foreach($categories as $category)
                        <li><a href="#" class="cat_link" data-id="{{$category->id}}">{{$category->name}}<span>({{$category->posts_count}})</span></a></li>
                    @endforeach
                @endif
            </ul>
        </div>

        <!-- Kraj Categories -->

        <!-- Recent Posts -->
        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">
            @if($recent)
                @foreach($recent as $rec)
                    <div class="post-item clearfix">
                        <img src="{{asset('storage/img/posts-img/'.$rec->filename)}}" alt="">
                        <h4><a href="{{route('posts.show',$rec->id)}}">{{$rec->heading}}</a></h4>
                        <time datetime="{{$rec->created_at}}">{{$rec->created_at->format('M, d Y')}}</time>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Kraj Recent Postova -->
        <!-- Tagovi -->
        <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>
                @if($tags)
                    @foreach($tags as $tag)
                        <li><a href="" class="tag-links" data-id="{{$tag->id}}">{{$tag->name}}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- Kraj Tagova -->
    </div>

</div>
</div>
</div>
</section>
