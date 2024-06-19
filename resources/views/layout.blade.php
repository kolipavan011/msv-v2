<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    {!! seo($SEOData) !!}

    <!-- Style -->
    @vite('resources/scss/app.scss')

    <!-- Google tag (gtag.js) -->
    @if (config('app.env') === 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.google_code')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{config("app.google_code")}}');
    </script>
    @endif

</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container justify-content-md-bewteen justify-content-center">
                <a class="navbar-brand" href="{{ config('app.url') }}">
                    <img height="30px" src="/img/logo.jpg" alt="mirchi status logo">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @foreach ($sidebar['navigation'] as $link)
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fw-bold" href="{{ route('category',['slug'=> $link->slug]) }}">
                                {{ $link->label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <div class="aside">
        @include('sidebar')
    </div>
    <footer>
        <div class="bg-dark">
            <div class="text-center py-3">
                <p class="text-white mb-0">mirchistatusvideo.com @ 2024</p>
            </div>
        </div>
    </footer>
    @vite('resources/js/script.js')
</body>

</html>