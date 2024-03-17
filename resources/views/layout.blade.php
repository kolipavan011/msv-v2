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
    <div class="header">
        @include('header')
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="aside">
        @include('sidebar')
    </div>
    <div class="footer">
        @include('footer')
    </div>
    @vite('resources/js/script.js')
</body>

</html>