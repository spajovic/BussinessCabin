<!-- Sadrzaj web-sajta -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Learn how to manage your business</h1>
                <h2>We are team of talented managers writing posts, showing you how to expand your business</h2>
                <div>
                    <a href="{{route('posts.index')}}"class="btn-get-started scrollto">Read our latest posts</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="{{asset('assets/img/hero-img.svg')}}" class="img-fluid animiran" alt="productvity">
            </div>
        </div>
    </div>
</section>
<!-- Main -->
<main id="main">
    <section id="about">
        <section id="about" class="about">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                        <img src="{{asset('assets/img/about-img.svg')}}" class="img-fluid" alt="" data-aos="zoom-in">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up">Who are we?</h3>
                        <p data-aos="fade-up" data-aos-delay="100">
                            We are up and coming bussiness blog, focusing on the best marketing and business leading inteligence we can find.
                        </p>
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Class leading writers</h4>
                                <p>Identifying and building your audience is difficult because there are so many choices for readers.</p>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Best Logistics</h4>
                                <p>The first step to accomplishing a task is planning. Now, planning encapsulates various factors.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
<!-- End main -->
