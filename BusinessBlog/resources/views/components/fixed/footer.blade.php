<!-- Footer -->
<footer id="footer">
    <!-- Sabskrajb -->
    <div class="footer-subs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join our newsletter</h4>
                    <p>Feel free to subscribe to our newsletter and get notifications about latest posts we made.</p>
                    <form action="{{route('newsletter.subscribe')}}" method="POST">
                        <input type="email" name="email" id="sub-mail">
                        <input type="submit" value="Subscribe" id="sub-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Kraj Sub -->
    <!-- div iznad -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3>BusinessCabin</h3>
                    <p>Nikšićka 2, Voždovac <br> 11000 Beograd <br> Srbija <br><br> <strong>Phone: </strong>+3811135534789 <br> <strong>Email: </strong>businesscab@gmail.com</p>
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @if($navigation)
                            @foreach($navigation as $nav)
                                @if($nav->name == 'Home' || $nav->name == 'Posts')
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{route($nav->href)}}">{{$nav->name}}</a></li>
                                @endif
                                @if($nav->name == "About")
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{route($nav->href).'#about'}}">{{$nav->name}}</a></li>
                                @endif
                                @if(!session()->has('user'))
                                    @if($nav->name == "Login" || $nav->name == "Register")
                                        <li><i class="bx bx-chevron-right"></i> <a href="#registerModal" data-bs-toggle="modal" data-bs-target="{{$nav->href}}">{{$nav->name}}</a></li>
                                    @endif
                                @endif
                            @endforeach
                                @if(session()->has('user'))
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('logout')}}">Logout</a></li>
                                @endif
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Here, you can find us on these social platforms, make sure to follow us</p>
                    <div class="social-links mt-3">
                        @if($socials)
                            @foreach($socials as $soc)
                                <a href="{{$soc->href}}" class="twitter" target="_blank"><i class="{{$soc->i_class}}"></i></a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="copyright">
            © Copyright <strong><span>BusinessCabin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://spajovic.netlify.app/">spajovic</a>
        </div>
    </div>
</footer>
<!-- Kraj Footer -->

