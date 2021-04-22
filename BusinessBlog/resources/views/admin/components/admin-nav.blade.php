<div class="col-lg-2 admin-left">
    <div class="admin-header">
        <h1>Howdy, &nbsp;{{session()->get('user')->name}}</h1>
    </div>
    <ul class="admin-ul" >
        <li class="admin-li" id="first">
            <i class='bx bx-glasses'></i>
            <a href="{{route('admin-first')}}">Admin panel</a>
        </li>
        <li class="admin-li" id="users">
            <i class='bx bx-user' ></i>
            <a href="{{route('admin-users')}}">Users</a>
        </li>
        <li class="admin-li" id="posts">
            <i class='bx bx-file'></i>
            <a href="{{route('admin-posts')}}">Posts</a>
        </li>
        <li class="admin-li" id="comments">
            <i class='bx bx-comment-detail' ></i>
            <a href="{{route('admin-comments')}}">Comments</a>
        </li>
        <li class="admin-li" id="categories">
            <i class='bx bx-category'></i>
            <a href="{{route('admin-categories')}}">Categories</a>
        </li>
        <li class="admin-li" id="tags">
            <i class='bx bx-purchase-tag'></i>
            <a href="{{route('admin-tags')}}">Tags</a>
        </li>
        <li class="admin-li" id="newsletter">
            <i class='bx bx-envelope'></i>
            <a href="{{route('admin-newsletter')}}">Newsletter</a>
        </li>
        <li class="admin-li" id="loginfo">
            <i class='bx bx-info-circle'></i>
            <a href="{{route('admin-loginfo')}}">Log Info</a>
        </li>
    </ul>
    @if(session()->has('success'))
        <div class="alert alert-success position-fixed top-0 end-1 p-3" role="alert"style="z-index: 5">
            {{session()->get('success')}}
        </div>
    @endif
    @if(session()->has('fail'))
        <div class="alert alert-danger position-fixed top-0 end-1 p-3" role="alert" style="z-index: 5">
            {{session()->get('fail')}}
        </div>
    @endif
</div>
