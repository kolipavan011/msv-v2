<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    {!! seo($SEOData) !!}

    <!-- Style -->
    @vite('resources/scss/app.scss')

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