<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 1.0 meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="LEFT RITE PHILLY HOUSE AND TECHNO">
    <meta name="author" content="SimplePixel">
    <meta name="keywords" content="house, techno, philadelphia, philly, left, rite">

    <!-- 2.0 title -->
    <title>LEFT RITE - PHILLY HOUSE AND TECHNO</title>

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- 3.0 CSS IMPORT -->
    <!-- CSS IMPORT FOR PLUGIN -->
    <link rel="stylesheet" href="{{ Theme::url('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/Pe-icon-7-stroke.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/owl.theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/jquery.wordrotator.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/loader.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/jquery.kenburnsy.css') }}" type="text/css">

    <!-- CSS IMPORT FOR FONT -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Dosis:400,500' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Courgette' type='text/css'>

    <!-- CSS IMPORT FOR MAIN STYLE AND COLOR SCHEME -->
    <link rel="stylesheet" href="{{ Theme::url('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Theme::url('css/color-scheme.css') }}" type="text/css">

    <!-- support HTML5 elements and media queries for IE9 -->
    <!--[if lt IE 9]>
    <script src="{{ Theme::url('js/html5shiv.js') }}"></script>
    {{-- @include('mainjs') --}}
    <![endif]-->
</head>
<body>
<!-- 4.0 preloader -->
<div class="preloader">
    <div class="line-scale-pulse-out-rapid">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- end preloader -->

<!-- 5.0 background container -->
<div class="bg-container">
</div>
<!-- end background container -->

<!-- 6.0 page container -->
<div class="page-container is-visible">
    <!--	6.1 social media link bottom,
            this social media links will be visible at the bottom of the page
            in every section except home section.

            THIS SOCIAL MEDIA LINKS WILL BE "HIDDEN" IN EXTRA SMALL DEVICES
    -->
    <div class="social-media-container-bottom col-lg-12 col-md-12">
        <a href="https://www.facebook.com/LEFTRITEPHL/" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/LEFTRITEphl" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.instagram.com/leftritephl/" entrance" target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="https://soundcloud.com/leftrite" target="_blank"><i class="fa fa-soundcloud"></i></a>
        <a href="https://www.mixcloud.com/LEFTRITEphl/" target="_blank"><i class="fa fa-mixcloud"></i></a>
        <a href="http://mixlr.com/leftritephl/" target="_blank"><i class="fa fa-music"></i></a>
    </div>
    <!-- end social media link bottom -->

    <!-- 6.2 menu container -->
    <div class="menu-container col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12 entrance animated">
        <!-- 6.2.1 logo -->
        <div class="logo entrance animated">
            <img src="{{ Theme::url('img/leftritelogo.png') }}" alt="logo" />
        </div>
        <!-- end logo -->

        <!-- 6.2.2 countdown container -->

        <div class="countdown-container col-lg-4 col-md-6 col-sm-12 col-xs-12 entrance animated">
            <a href="https://www.facebook.com/events/148747435563303/" class="link-button" target="_blank">
                <p class="countdown-title">days till next event</p>
                <!-- countdown -->
                <div class="countdown" id="lwt-countdown">
                    <div class="dash days_dash">
                        <div class="digit">0</div><div class="digit">0</div><div class="digit">0</div>
                    </div>
                </div>
            </a>

            <!-- end countdown -->
        </div>

        <!-- end countdown container -->

        <!-- 6.2.3 menu -->
        <nav class="menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- this link will on VISIBLE ON EXTRA SMALL DEVICES -->
            <a href="#" class="show-menu"><i class="pe-7s-menu"></i> menu</a>

            <!-- menu wrapper -->
            <div class="menu-wrapper">
                <a href="#" class="nav-home active" data-letters="home">home</a>
                <a href="#" class="nav-about" data-letters="about">about</a>
                <a href="#" class="nav-subscribe" data-letters="subscribe">subscribe</a>
                <a href="#" class="nav-events" data-letters="events">events</a>
                <a href="#" class="nav-contact" data-letters="contact">contact</a>

                <!-- this link will on VISIBLE ON EXTRA SMALL DEVICES -->
                <a href="#" class="close-menu"><i class="pe-7s-angle-up"></i></a>
            </div>
            <!-- end menu wrapper -->
        </nav>
        <!-- end menu -->
    </div>
    <!-- end menu container -->

    @yield('content')

            <!-- 8.0 javascript import -->
    <!-- jquery -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.js') }}"></script>
    <!-- bootstrap -->
    <script type="text/javascript" src="{{ Theme::url('js/bootstrap.min.js') }}"></script>
    <!-- countdown -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.lwtCountdown-1.0.js') }}"></script>
    <!-- backstretch -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.backstretch.min.js') }}"></script>
    <!-- jquery validate -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.validate.min.js') }}"></script>
    <!-- magnific popup -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- tweetie (twitter feed plugin) -->
    <script type="text/javascript" src="{{ Theme::url('js/tweetie.js') }}"></script>
    <!-- owl carousel -->
    <script type="text/javascript" src="{{ Theme::url('js/owl.carousel.js') }}"></script>
    <!-- jquery wordrotator -->
    <script type="text/javascript" src="{{ Theme::url('js/jquery.wordrotator.min.js') }}"></script>
    <!-- constellation (star-effect) -->
    <script type="text/javascript" src="{{ Theme::url('js/constellation.js') }}"></script>
    <!-- google map -->
    <script src="http://maps.google.com/maps/api/js?sensor=false') }}"></script>
    <!-- main js -->
@include('mainjs')
</body>
</html>