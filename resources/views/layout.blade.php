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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B1E0GHZ4GX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-B1E0GHZ4GX');
    </script>

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