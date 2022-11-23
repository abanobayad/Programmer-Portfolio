
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Abanoub Ayad - Backend Developer Portfolio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Abanoub Ayad Backend Developer Laravel PHP  HTML CSS HTML5 LARAVEL JS JavaScript" name="keywords">
    <meta content="Abanoub Ayad Backend Developer Laravel PHP  HTML CSS HTML5 LARAVEL JS JavaScript" name="description">

    <!-- Favicon -->
    <link href="/img/logo/svg/w.svg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link href="/fa/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo/svg/w.svg" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">

        <!-- Navbar Start -->
        <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 display-5"><span class="text-primary">Abanoub</span>Ayad</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="float: right" class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
                <a  style="float: right" href="/" class="btn btn-outline-primary d-none d-lg-block">Home
                    <i class="fa 2x-fa fa-home"></i>
                </a>
            </div>
        </nav>
        <!-- Navbar End -->


        <div class="container">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 m-auto col-md-12">
                                <div class="card mb-3 pb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <div class="card-body m-auto">
                                                <div class="row ">
                                                    <div class="col-12">
                                                        <h4 class="card-text"> <span
                                                                class="font-weight-bold text-primary">{{ $project->title }}</span> Project </h4>
                                                        <p class="card-text">Desctription : <span
                                                                class="font-weight-bold text-primary">{{ $project->desc }}</span> </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="mt-1 text-bold">Images </label>
                                                    {{--Start Images Section  --}}
                                                            <!-- Project Start -->
                                                                            <div class="container-fluid pt-5 pb-3" id="port">
                                                                                <div class="container">
                                                                                    <div class="row portfolio-container">
                                                                                {{-- Start Foreach --}}
                                                                                    @foreach ( $images as $image )
                                                                                        <div class="col-lg-4 col-md-6 mb-4 portfolio-item">
                                                                                            <div class="position-relative overflow-hidden mb-2">
                                                                                                {{-- {{dd($project->images->first->image->image)}} --}}
                                                                                                <img style="max-height: 250px ; object-fit: cover" class="img-fluid rounded w-100" src="{{Storage::disk('s3')->url($image->image)}}"  alt="{{$project->title}}">
                                                                                                <div class="portfolio-btn  d-flex align-items-center justify-content-center">
                                                                                                    <a class="text-center" style="text-decoration: none" href="{{Storage::disk('s3')->url($image->image)}}" data-lightbox="port">
                                                                                                        <i class="fa fa-search text-center text-primary" style="font-size: 32px;"></i>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                {{-- End Foreach --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Project End -->

                                                    {{-- End Img Section --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social mr-2" target="_blank" href="https://twitter.com/Abanob_Edo"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-light btn-social mr-2" target="_blank" href="https://www.facebook.com/3edo2020/"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-light btn-social mr-2" target="_blank" href="https://www.linkedin.com/in/abanobayad2020/"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-light btn-social" target="_blank" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div>
            <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">Abanoub Ayad</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="#">Abanoub Ayad</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

        </div>





    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    {{-- <script src="/js/jq3.4.0.js')}}"></script>
    <script src="/lib/bt/js/bootstrap.bundle.min.js')}}"></script>
    <script src="/lib/bt/js/bootstrap.bundle.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/typed/typed.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/lib/lightbox/js/lightbox.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <!-- Contact Javascript File -->
    <script src="/mail/jqBootstrapValidation.min.js"></script>
    <script src="/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    @include('sweetalert::alert')

</body>
</html>
