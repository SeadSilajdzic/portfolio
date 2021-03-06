<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Personal Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('dAssets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('dAssets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dAssets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('dAssets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dAssets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dAssets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dAssets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dAssets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('dAssets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: MyResume - v4.3.0
    * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ $project->featured }}" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $project->category->name }}</li>
                            <li><strong>Client</strong>: {{ $project->client }}</li>
                            <li><strong>Project date</strong>: {{ $project->created_at->toFormattedDateString() }}</li>
                            @if($project->project_url)
                                <li><strong>Project URL</strong>: <a href="{{ $project->project_url }}" target="_blank">{{ $project->client }}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>{{ __('About project')  }}</h2>
                        {!! $project->description !!}
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('dAssets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('dAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dAssets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('dAssets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('dAssets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('dAssets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('dAssets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('dAssets/vendor/typed.js') }}/typed.min.js') }}"></script>
<script src="{{ asset('dAssets/vendor/waypoints/noframework.waypoints.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('dAssets/js/main.js') }}"></script>

</body>

</html>
