<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if ($route == 'post')
    <url>
        <loc>{{ config('app.url') }}</loc>
        <lastmod>{{ today()->tz('UTC')->toAtomString() }}</lastmod>
    </url>
    @endif
    @foreach ($urls as $url)
    <url>
        <loc>{{ $url['url'] }}</loc>
        <lastmod>{{ $url['time'] }}</lastmod>
    </url>
    @endforeach
</urlset>