<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Favicon -->
    <link href="img/favicon.html" rel="icon">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">

    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="p-0 navbar navbar-expand-sm bg-dark">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <!-- recuperation automatique de la date formatee en français -->
                            <a class="nav-link text-body small" href="#">
                                {{ \Carbon\Carbon::now()->locale('fr')->translatedFormat('d F Y') }}
                            </a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="text-right col-lg-3 d-none d-md-block">
                <nav class="p-0 navbar navbar-expand-sm bg-dark">
                    <ul class="ml-auto navbar-nav mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="py-3 bg-white row align-items-center px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="p-0 navbar-brand d-none d-lg-block">
                    <img src="{{ asset('assets/img/icon.png') }}" alt="logo" style="width: 150px;">
                </a>
            </div>
            <div class="text-center col-lg-8 text-lg-right">
                <a href="../../htmlcodex.com/index.html"><img class="img-fluid" src="{{ asset('assets/img/ads-72890.png') }}" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="p-0 container-fluid">
        <nav class="py-2 navbar navbar-expand-lg bg-dark navbar-dark py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <img src="{{ asset('assets/img/icon.png') }}" alt="logo" style="width: 150px;">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="px-0 collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="py-0 mr-auto navbar-nav">
                    <a href="/" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Accueil</a>
                    <a href="{{ route('news.index') }}" class="nav-item nav-link {{ Route::is('news.index') ? 'active' : '' }}">Actualités</a>
                    <a href="{{ route('videos.index') }}" class="nav-item nav-link {{ Route::is('videos.index') ? 'active' : '' }}">Vidéos</a>
                    <a href="{{ route('contacts') }}" class="nav-item nav-link {{ Route::is('contacts') ? 'active' : '' }}">Contacts</a>
                </div>

                <div class="ml-auto input-group d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="border-0 form-control" placeholder="Recherche">
                    <div class="input-group-append">
                        <button class="px-3 border-0 input-group-text bg-primary text-dark">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Page Content -->
    @if(session('newsletter_success'))
        <div class="px-4 py-3 mb-4 text-center text-white border rounded bg-success">
            {{ session('newsletter_success') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelector('.bg-green-500').classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            });
        </script>
    @endif

    @if(session('newsletter_error'))
        <div class="px-4 py-3 mb-4 text-center text-white border rounded bg-danger">
            {{ session('newsletter_error') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelector('.bg-red-500').classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            });
        </script>
    @endif

    @if(session('success'))
        <div class="px-4 py-3 mb-4 text-center text-white border rounded bg-success">
            {{ session('success') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelector('.bg-green-500').classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            });
        </script>
    @endif

    @if(session('error'))
        <div class="px-4 py-3 mb-4 text-center text-white border rounded bg-danger">
            {{ session('error') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelector('.bg-red-500').classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            });
        </script>
    @endif

    @yield('content')

    <!-- Footer Start -->
    <div class="pt-5 mt-5 container-fluid bg-dark px-sm-3 px-md-5">
        <div class="py-4 row">
            <div class="mb-5 col-lg-4 col-md-6">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Nos Coordonnées</h5>
                <p class="font-weight-medium"><i class="mr-2 fa fa-map-marker-alt"></i>Adresse de l'entreprise</p>
                <p class="font-weight-medium"><i class="mr-2 fa fa-phone-alt"></i>+243 000 000 000</p>
                <p class="font-weight-medium"><i class="mr-2 fa fa-envelope"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Suivez-nous</h6>
                <div class="d-flex justify-content-start">
                    <a class="mr-2 btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="mr-2 btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="mr-2 btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="mr-2 btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="mb-5 col-lg-4 col-md-6">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Actualités populaires</h5>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="p-1 mr-2 badge badge-primary text-uppercase font-weight-semi-bold" href="#">Politique</a>
                        <a class="text-body" href="#"><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="p-1 mr-2 badge badge-primary text-uppercase font-weight-semi-bold" href="#">Sport</a>
                        <a class="text-body" href="#"><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="p-1 mr-2 badge badge-primary text-uppercase font-weight-semi-bold" href="#">Musique</a>
                        <a class="text-body" href="#"><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="#">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
            </div>
            <div class="mb-5 col-lg-4 col-md-6">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politics</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Corporate</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Health</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Education</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Science</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Foods</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Entertainment</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Travel</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Lifestyle</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politics</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Corporate</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Health</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Education</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Science</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Politique</a>
                    <a href="#" class="m-1 btn btn-sm btn-secondary">Foods</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4 container-fluid px-sm-3 px-md-5" style="background: #111111;">

        <p class="m-0 text-center">&copy; <a href="#">{{ \Carbon\Carbon::now()->locale('fr')->translatedFormat('Y') }}</a>. All Rights Reserved.

		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Distributed by <a href="../../themewagon.com/index.html">Le Phare News</a>
    </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>


<!-- Mirrored from themewagon.github.io/biznews/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jan 2026 17:09:13 GMT -->
</html>
