<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <title>{{$project->title}} proejct | Abanoub Ayad</title>

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
    <!-- ====== Header ====== -->
    <header id="header" class="header"> <!-- ====== Navbar ====== -->
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
                        <li class="nav-item"><a href="/" class="nav-link" >HOME</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====== // Navbar ====== -->

        <!-- Page Title -->
        <div class="page-title bg-img section-padding bg-overlay" style="background-repeat: no-repeat; background-origin: content-box; background-position: center; background-size:cover; background-image: url({{Storage::disk('s3')->url($project->images->first->image->image)}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{$project->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Page Title -->
    </header>
    <!-- ====== // Header ====== -->



    <section class="blog-section">
        <div class="container">
            <div class="row">
                <!-- Blog Main Content -->
                <div class="col-lg-12">
                    <div class="blog-post">
                        <img src="{{Storage::disk('s3')->url($project->images->first->image->image)}}" alt="" class="blog-img">
                        <h4 class="blog-title"><a href="#">{{$project->title}}</a></h4>
                        <p class="blog-meta"><span class="blog-date">{{$project->created_at->translatedFormat('j F Y');}}</span></p>
                        <div class="blog-main-content">

                            <blockquote class="blockquote bg-light">
                                <h6>{{$project->title}}</h6>
                                <p>{{$project->desc}}</p>
                            </blockquote>

                            <div class="blog-content-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                            <!-- ====== Portfolio Section ====== -->
                                                                <section id="portfolio" class="section-padding pb-85 portfolio-area bg-light">
                                                                    <div class="container">
                                                                        <!-- Section Title -->
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-lg-6 ">
                                                                                <div class="section-title text-center">
                                                                                    <h2>Project Images</h2>
                                                                                    <p>some of {{$project->title}} project images </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- //Section Title -->

                                                                        <div class="row portfolio">

                                                                            @foreach ($images as $image )
                                                                                <!-- Single Portfolio -->
                                                                                <div class="col-lg-4 col-md-6 mix wp logo graphic web">
                                                                                    <div class="single-portfolio" style="background-image: url({{Storage::disk('s3')->url($image->image)}})">
                                                                                        <div class="portfolio-icon text-center">
                                                                                            <a data-lightbox='lightbox' href="{{Storage::disk('s3')->url($image->image)}}"><i class="fas fa-expand-arrows-alt"></i></a>
                                                                                        </div>
                                                                                        <div class="portfolio-hover other">
                                                                                            <h4>{{$project->title}} <span>Project</span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- // Single Portfolio -->
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </section>
                                            <!-- ====== // Portfolio Section ====== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Blog Main Content -->

            </div>
        </div>
    </section>

    <!-- ====== Footer Area ====== -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p class="text-white">&copy; 2018 <a href="#">A Template Designed by Begindot</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== // Footer Area ====== -->


    <!-- ====== ALL JS ====== -->
    <script>
        @include('sweetalert::alert')
     </script>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/lightbox.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.mixitup.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/typed.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>
