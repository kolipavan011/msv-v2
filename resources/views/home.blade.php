@extends('layout')

@section('content')
<main class="main-content">
    <div class="py-5 bg-white">
        <div class="container text-center">
            <header>
                <h1 class="mb-3">Mirchi Status Video Download, Best Whatsapp Status Videos</h1>
                <p>Best Whatsapp Status Video download, Full Screen Status Video, Download Status Videos from god status video, sad status video and more here. Download latest video status and just share with friends and family. express feeling to world..!</p>
            </header>
        </div>
    </div>
    <div class="my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($posts as $post)
                <article class="col" id="post-{{$post->id}}">
                    <div class="card h-100">
                        @isset($post->feature_image)
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{$post->title}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class=" bg-secondary w-100 card-img-top lazy" width="360" height="270" data-src="{{ url($post->feature_image) }}" alt="{{$post->title}}" title="{{$post->title}}">
                        </a>
                        @endisset
                        <div class="card-body">
                            <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{$post->title}}">
                                <h2 class="h5 card-title text-dark">{{ $post->title }}</h2>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="row my-5">
                {{ $posts->onEachSide(0)->links() }}
            </div>
        </div>
        <div class="container">
            <h2>Best whatsapp status video download</h2>
            <p>This is age of social media. everyone uses social media app on daily basis and keep updated thair whatsapp status, facebook status and feeds. Here we have come up with <strong>whatsapp status video</strong> to make easy for them to search and download <strong>best status video</strong> of their choice on single click.</p>
            <p><strong>mirchi status video</strong> has 20+ categories related <strong>status video</strong> to download <strong>whatsapp status video</strong>. Love Status Video, God Status Video, Motivation Video, Sad Status Videos are some example of category we provides. Go to our category section below to search favourate category.</p>
            <p>Social media has important role in daily life which keep friends and family updated. People spend time on this plateform with friends share <strong>reels status video</strong><strong>whatsapp status video</strong>.</p>
            <h2>Mirchi Status Video for whatsapp status video</h2>
            <p>Find hundreds of great WhatsApp status videos that you can download! Look through popular, humorous, moving, and inspirational videos to find innovative ways to express oneself. Get the most recent updates and shareable material to improve your WhatsApp experience with our user-friendly platform. Download now <strong>best whatsapp status video</strong> and share your feeling with world ..!</p>
            <p>With the newest feelings and trends on <strong>Mirchi Status video</strong>, liven up your day! Whether you're laughing or sad, there's a clip for you. With a <strong>Mirchi Status video</strong>, discover share, and let everyone experience the fire of your emotions!</p>
        </div>
    </div>
</main>
@endsection