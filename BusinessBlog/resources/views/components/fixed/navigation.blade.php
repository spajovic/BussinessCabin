<!-- Modali -->
@include('components.modals.login-modal')

<!-- Register Modal -->
@include('components.modals.register-modal')

<!-- Send Message Modal -->
@include('components.modals.email-modal')

<!-- Upload new Picture for user -->
@include('components.modals.userpicture-modal')

<!-- Kraj Modala -->
<!-- Header sajta -->
<header id="header" class="fixed-top d-flex align-items-center justify-content-around">
    <!-- LOGO brt -->
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1 class="text-light">
                <a href="{{route('home')}}">
                    <span>BusinessCabin</span>
                </a>
            </h1>
        </div>
    </div>
    <!-- Kraj LOGA -->
    <!-- Navigacija  -->
    <nav class="navbar navbar-expand-lg navbar-light me-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @if($navigation)
                        @foreach($navigation as $nav)
                            @if($nav->name == 'Home')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route($nav->href)}}">{{$nav->name}}</a>
                                </li>
                            @endif
                            @if($nav->name == 'About')
                                 <li class="nav-item">
                                    <a class="nav-link" href="{{route($nav->href).'#about'}}">{{$nav->name}}</a>
                                 </li>
                            @endif
                            @if($nav->name == "Posts")
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route($nav->href)}}">{{$nav->name}}</a>
                                    </li>
                            @endif
                            @if(!session()->has('user'))
                                @if($nav->name == 'Login' || $nav->name == 'Register')
                                    <li class="nav-item">
                                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="{{$nav->href}}">{{$nav->name}}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                            @if(session()->has('user'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{session()->get('user')->name}}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#pictureModal">Edit Profile</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#emailModal">Message</a>
                                </li>
                            @endif

                    @endif
                </ul>
            </div>
        </div>
    </nav>
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
</header>

<!-- Kraj header-a -->
