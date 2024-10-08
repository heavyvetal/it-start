<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@lang('main.title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="{!! $meta['keywords'] !!}">
    <meta name="description" content="{!! $meta['description'] !!}">
    <meta property="og:title" content="{!! $metaOg['title'] !!}">
    <meta property="og:description" content="{!! $metaOg['description'] !!}">
    <meta property="og:image" content="{{ $metaOg['image'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/img/new_logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/css/style.css?ver=1.1" rel="stylesheet">
</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        {{-- Prevent cyclic link --}}
        @if(request()->route()->getName() !== 'home')
            <a href="/{{ $defaultLangPrefix }}" class="navbar-brand ml-lg-3">
                @include('pages.additions.logo')
            </a>
        @else
            <span class="navbar-brand ml-lg-3">
                @include('pages.additions.logo')
            </span>
        @endif
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="/{{ $defaultLangPrefix }}" class="nav-item nav-link">@lang('main.home')</a>
                <a href="/{{ $defaultLangPrefix }}#about" class="nav-item nav-link">@lang('main.about')</a>
                <a href="/{{ $generalLangPrefix }}courses" class="nav-item nav-link">@lang('main.courses')</a>
                <a href="/{{ $defaultLangPrefix }}#prices" class="nav-item nav-link" rel="nofollow">
                    @lang('main.prices')
                </a>
                <a href="/{{ $defaultLangPrefix }}#contact" class="nav-item nav-link">@lang('main.contacts')</a>
            </div>
            <div class="language">
                <a id="lang-btn" class="btn btn-primary py-2 px-4 d-lg-block">{{ app()->getLocale() }}</a>
                <div class="dropdown-language">
                    @foreach($languageSelectorItems as $item)
                        <a href="{{ $item['link'] }}">{{ $item['lang'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Header Start -->
<div id="header" class="jumbotron jumbotron-fluid position-relative overlay-bottom">
    <canvas id="header-canvas"></canvas>
    <div class="container text-center my-5" style="position: relative">
        <div>
            <h1 class="text-white display-1 mb-5">@lang('home_page.top.big_title')</h1>
        </div>
        <div>
            <ul class="fa-ul">
                <h2 class="text-white"><li>@lang('home_page.top.second_title.row1')</li></h2>
                <h2 class="text-white"><li>@lang('home_page.top.second_title.row2')</li></h2>
                <h2 class="text-white"><li>@lang('home_page.top.second_title.row3')</li></h2>
            </ul>
        </div>
{{--        <h2 class="text-white mt-4 mb-4">--}}
{{--            @lang('home_page.top.second_title')--}}
{{--        </h2>--}}
        <div class="try-it-button pt-4 row">
            <a href="/{{ $defaultLangPrefix }}#sign-up" class="btn btn-secondary py-3 px-5" type="submit">@lang('home_page.top.try_button')</a>
        </div>
    </div>
</div>
<!-- Header End -->

@yield('content')

<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 60px;">
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">@lang('main.get_in_touch')</h3>
                <p>
                    <i class="fa fa-map-marker-alt mr-2"></i>
                    @lang('contacts.location')
                </p>
                <p>
                    <i class="fa fa-phone-alt mr-2"></i>
                    <a rel="nofollow">@lang('contacts.phone')</a>
                </p>
                <p>
                    <i class="fa fa-envelope mr-2"></i>
                    @lang('contacts.email')
                </p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">@lang('main.our_courses')</h3>
                <div class="d-flex flex-column justify-content-start">
                    @foreach($topCourses as $course)
                        <a class="text-white-50 mb-2" href="{{ '/' . $generalLangPrefix . 'courses/' . $course->name }}"><i class="fa fa-angle-right mr-2"></i>{{ $course->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">@lang('main.quick_links')</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="/{{ $generalLangPrefix }}articles/privacy" rel="nofollow">
                        <i class="fa fa-angle-right mr-2"></i>
                        @lang('main.privacy')
                    </a>
                    <a class="text-white-50 mb-2" href="/{{ $defaultLangPrefix }}#contact">
                        <i class="fa fa-angle-right mr-2"></i>
                        @lang('main.contacts')
                    </a>
                    <a class="text-white-50 mb-2" href="/{{ $defaultLangPrefix }}#about">
                        <i class="fa fa-angle-right mr-2"></i>
                        @lang('main.about')
                    </a>
                    <a class="text-white-50 mb-2" href="/{{ $defaultLangPrefix }}#prices" rel="nofollow">
                        <i class="fa fa-angle-right mr-2"></i>
                        @lang('main.prices')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0">&copy; @lang('main.school_name_full'). @lang('main.rights')
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="m-0">@lang('main.developer_beginning')
                    <a class="text-white" href="https://in-da-web.epizy.com">Inda Web Studio</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/counterup/counterup.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js?ver=1.0"></script>
<script src="/js/animation.js?ver=1.0"></script>

<!-- Faq -->
<script  src="/js/faq.js"></script>

</body>
</html>
