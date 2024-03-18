@extends('layout')

@section('content')
<main class="main-content">
    <article>
        <div class="py-4 bg-white">
            <header>
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-nowrap">
                            <li class="breadcrumb-item"><a href="{{ config('app.url')}}" class="text-danger">Home</a></li>
                            <li class="breadcrumb-item active text-truncate text-muted" aria-current="page"> {{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="container">
                    <h1 class="mb-3 h2">{{ $post->title }}</h1>
                    @include('components.share')
                    {!! $post->description !!}
                </div>
            </header>
        </div>
        <div class="my-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                    @forelse ($post->videos as $video)
                    <div class="col" id="post-{{$video->id}}">
                        <div class="card h-100">
                            <div class="video-container">
                                <video poster="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" style="background-color: #ccc;" id="video-{{$video->id}}" class="w-100 card-img-top lazy" width="360" height="260" src="{{ url($video->path) }}" data-poster="{{ url($video->thumbnail) }}" preload="none"></video>
                                <a href="#" class="play-btn" role="button" data-video="video-{{$video->id}}">
                                    <span class="play-icon bg-danger rounded-circle">
                                        <svg fill="#fff" class="material-design-icon__svg" width="50" height="50" viewBox="0 0 24 24">
                                            <path d="M8,5.14V19.14L19,12.14L8,5.14Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="h6 card-title text-muted text-truncate">{{ $video->title }}</p>
                            </div>
                            <a href="{{ url($video->path) }}" type="button" class="btn btn-danger rounded-0" download>
                                Download ({{ $video->size }})
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class=" p-5 text-center fw-bold border border-danger flex-grow-1 rounded">
                        <p class="m-0 text-danger">No Video found ..!</p>
                    </div>
                    @endforelse
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        {!! $post->body !!}
                    </div>
                </div>
                @if (count($related) > 0)
                <div class="row mb-3">
                    <div class="col">
                        <h2>Related Video Status to {{$post->title}}</h2>
                        <p>Lets find similar whatsapp status video article below. Here are some of best video status related to {{ $post->title }}</p>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($related as $_post)
                    <article class="col" id="post-{{$_post->id}}">
                        <div class="card h-100">
                            @isset($_post->feature_image)
                            <a href="{{ route('post', ['slug' => $_post->slug]) }}" title="{{$_post->title}}">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class=" bg-secondary w-100 card-img-top lazy" width="360" height="270" data-src="{{ url($_post->feature_image) }}" alt="{{$_post->title}}" title="{{$_post->title}}">
                            </a>
                            @endisset
                            <div class="card-body">
                                <a href="{{ route('post', ['slug' => $_post->slug]) }}" title="{{$_post->title}}">
                                    <h3 class="h5 card-title text-dark">{{ $_post->title }}</h3>
                                </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </article>
</main>
@endsection