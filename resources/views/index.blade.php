<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <meta content="Abanoub Ayad Backend Developer Laravel PHP  HTML CSS HTML5 LARAVEL JS JavaScript" name="keywords">
    <meta content="Abanoub Ayad Backend Developer Laravel PHP  HTML CSS HTML5 LARAVEL JS JavaScript" name="description">

    <title>Abanoub Ayad</title>

    <!-- ====== Google Fonts ====== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">

    <!-- ====== ALL CSS ====== -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/lightbox.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>

<body data-spy="scroll" data-target=".navbar-nav">

    <!-- Preloader -->
        <div class="preloader">
            <div class="spinner">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>
    <!-- // Preloader -->

    <!-- ====== Header ====== -->
    <header id="header" class="header">
        <!-- ====== Navbar ====== -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand logo" href="/">
                    <img src="/img/logo/svg/w.svg" alt="logo">
                </a>
                <!-- // Logo -->

                <!-- Mobile Menu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"><span><i class="fa fa-bars"></i></span></button>
                <!-- Mobile Menu -->

                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="#home">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#service">SERVICE</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">PROJECTS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#certs">CERTIFICATES</a></li>
                        <li class="nav-item"><a class="nav-link pr0" href="#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====== // Navbar ====== -->
    </header>
    <!-- ====== // Header ====== -->

    <!-- ====== Hero Area ====== -->
    <div class="hero-aria" id="home">
        <!-- Hero Area Content -->
        <div class="container">
            <div class="hero-content h-100">
                <div class="d-table">
                    <div class="d-table-cell">
                        <h2 class="text-uppercase">Let's Begin</h2>
                        {{-- <h3 class="text-uppercase"><span class="typed"></span></h3> --}}
                        <h3 class="text-uppercase"><span class="">{{$about->JobTitle}}</span></h3>
                        <p>Make Your Website by Abanoub Ayad.</p>
                        <a href="#about" class="button smooth-scroll">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Hero Area Content -->
        <!-- Hero Area Slider -->
        <div class="hero-area-slids owl-carousel">
            <div class="single-slider">
                <!-- Single Background -->
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/1.jpg)"></div>
                <!-- // Single Background -->
            </div>
            <div class="single-slider">
                <!-- Single Background -->
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/3.jpg)"></div>
                <!-- // Single Background -->
            </div>
        </div>
        <!-- // Hero Area Slider -->
    </div>
    <!-- ====== //Hero Area ====== -->

    <!-- ====== About Area ====== -->
    <section id="about" class="section-padding about-area bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>About Me</h2>
                        <p>Know some information about me</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-bg" style="background-image:url({{Storage::disk('s3')->url($about->image)}})">
                        <!-- Social Link -->
                        <div class="social-aria">
                            <a target="_blank" href="https://www.linkedin.com/in/abanobayad2020"><i class="fab fa-linkedin"></i></a>
                            <a target="_blank" href="https://github.com/abanobayad"><i class="fab fa-github"></i></a>
                        </div>
                        <!-- // Social Link -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Hello, I am <span>{{$about->name}}</span></h2>
                        <h4>{{$about->JobTitle}}</h4>
                        <p>{{$about->desc}}</p>

                        <h5>My Skills</h5>

                        <!-- Skill Area -->
                        <div id="skills" class="skill-area">

                            @foreach ($skills as $skill )
                                <!-- Single skill -->
                                <div class="single-skill">
                                    <div class="skillbar" data-percent="{{$skill->value}}%">
                                        <div class="skillbar-title"><span>{{$skill->title}}</span></div>
                                        <div class="skillbar-bar"></div>
                                        <div class="skill-bar-percent">{{$skill->value}}%</div>
                                    </div>
                                </div>
                                <!-- //Single skill -->
                            @endforeach

                        </div>
                        <!-- //Skill Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== // About Area ====== -->

    <!-- ====== Service Section ====== -->
    <section id="service" class="section-padding pb-70 service-area bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Service</h2>
                        <p>What i do for you ?</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <div class="row">
                @foreach ( $services as $service )
                    <!-- Single Service -->
                    <div  class="col-lg-4 col-md-6">
                        <div class="single-service" style="min-height: 250px">
                            <div class="service-icon">
                                <i class="{{$service->fontaws}}"></i>
                            </div>
                            <h2>{{$service->title}}</h2>
                            <p>{{$service->desc}}</p>
                        </div>
                    </div>
                    <!-- //Single Service -->
                @endforeach
            </div>

        </div>
    </section>
    <!-- ====== //Service Section ====== -->

    <!-- ====== Why choose Me Section ====== -->
        {{-- <section id="" class="section-padding why-choose-us pb-70">
            <div class="container">
                <!-- Section Title -->
                <div class="row justify-content-center">
                    <div class="col-lg-6 ">
                        <div class="section-title text-center">
                            <h2>Why choose Me</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <!-- //Section Title -->
                <div class="row">
                    <!-- Single Why choose me -->
                    <div class="col-md-6">
                        <div class="single-why-me why-me-left">
                            <div class="why-me-icon">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                        <i class="fa fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                            <h4>Completed on right time</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                        </div>
                    </div>
                    <!-- // Single Why choose me -->

                    <!-- Single Why choose me -->
                    <div class="col-md-6">
                        <div class="single-why-me why-me-right">
                            <div class="why-me-icon">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                        <i class="fa fa-calendar-check"></i>
                                    </div>
                                </div>
                            </div>
                            <h4>Completed on right time</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                        </div>
                    </div>
                    <!-- // Single Why choose me -->

                    <!-- Single Why choose me -->
                    <div class="col-md-6">
                        <div class="single-why-me why-me-left">
                            <div class="why-me-icon">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                        <i class="fa fa-history"></i>
                                    </div>
                                </div>
                            </div>
                            <h4>Completed on right time</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                        </div>
                    </div>
                    <!-- // Single Why choose me -->

                    <!-- Single Why choose me -->
                    <div class="col-md-6">
                        <div class="single-why-me why-me-right">
                            <div class="why-me-icon">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                        <i class="fa fa-phone-volume"></i>
                                    </div>
                                </div>
                            </div>
                            <h4>Completed on right time</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                        </div>
                    </div>
                    <!-- // Single Why choose me -->
                </div>
            </div>
        </section> --}}
    <!-- ====== //Why choose Me Section ====== -->



    <!-- ====== Project Section ====== -->
    <section id="projects" class="section-padding pb-70 blog-section bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Projects</h2>
                        <p>My latest projects</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row">
                @foreach ( $projects as $project )
                    <!-- Single Blog -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog" >
                            <div class="blog-thumb" style="background-image: url({{Storage::disk('s3')->url($project->images->first->image->image)}})"></div>
                            <h4 class="blog-title"><a href="#">{{$project->title}}</a></h4>
                            <p class="blog-meta">{{$project->created_at->translatedFormat('j F Y');}}</p>
                            <p
                            style="overflow: hidden ; max-height:50px "
                            >{{$project->desc}}</p>
                            <div class="row mt-4">
                                <div class="col-lg-6 col-md-0"></div>
                                <div class="col-lg-6 col-md-12">
                                    <a href="{{route('project.user.show' , $project->id)}}"  class="button  text-center">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog -->
                @endforeach

            </div>
        </div>
    </section>
    <!-- ====== // Blog Section ====== -->


    <!-- ====== Testimonial Section ====== -->
    <section id="testimonial" class="section-padding bg-secondary testimonial-area">
        <div class="container bg-white">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Testimonial</h2>
                        <p>Our Clients Said ?</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="testimonials owl-carousel" data-ride="carousel">

                        @foreach ($tests as $test )
                            <!-- Single Testimonial -->
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-quote">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <p>{{$test->comment}}</p>
                                    <h4>{{$test->name}}<span>{{$test->title}}</span></h4>

                                </div>
                            <!-- // Single Testimonial -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== // Testimonial Section ====== -->


    <!-- ====== Certifications Section ====== -->
    <section id="certs" class="section-padding pb-85 certs-area bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>CERTIFICATES</h2>
                        <p>My official certificates section</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <div class="row portfolio">

                @foreach ($certs as $cert )
                    <!-- Single Portfolio -->
                    <div class="col-lg-4 col-md-6 mix wp graphic">
                        <div class="single-portfolio" style="background-image: url({{Storage::disk('s3')->url($cert->image)}})">
                            <div class="portfolio-icon text-center">
                                <a data-lightbox='lightbox' href="{{Storage::disk('s3')->url($cert->image)}}"><i class="fas fa-expand-arrows-alt"></i></a>
                            </div>
                            <div class="portfolio-hover">
                                <h4>{{$cert->title}} </h4>
                            </div>
                        </div>
                    </div>
                    <!-- // Single Portfolio -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- ====== // Certifications Section ====== -->


    <!-- ====== Contact Area ====== -->
    <section id="contact" class="section-padding contact-section bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Contact Me</h2>
                        <p>Send Me An E-mail to Contact</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Form -->
                    <form  action="{{route('contacts.save')}}" method="POST"
                        class="contact-form bg-white">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="name" required placeholder="Name">
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" required placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <textarea name="message" class="form-control" required placeholder="Message"></textarea>
                        </div>
                        <div class="form-btn text-center">
                            <button class="button" type="submit">Send Message</button>
                        </div>
                    </form>
                    <!-- // Form -->
                </div>
            </div>
            <!-- // Contact Form -->
        </div>
    </section>
    <!-- ====== // Contact Area ====== -->



    <!-- ====== Footer Area ====== -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p class="text-white">&copy; 2018 <a href="#">The Website Designed by Begindot</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== // Footer Area ====== -->

    <!-- ====== ALL JS ====== -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/lightbox.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.mixitup.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/typed.js"></script>
    <script src="/assets/js/skill.bar.js"></script>
    <script src="/assets/js/fact.counter.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>
