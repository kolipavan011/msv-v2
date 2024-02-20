<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($sitemaps as $sitemap)
    <sitemap>
        <loc>{{ $sitemap }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </sitemap>
    @endforeach
</sitemapindex>