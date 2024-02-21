@extends('layout')

@section('content')
<main class="main-content">
    <div class="py-4 bg-white">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-nowrap">
                    <li class="breadcrumb-item"><a href="/" class="text-danger">Home</a></li>
                    <li class="breadcrumb-item active text-truncate text-muted" aria-current="page"> {{ $post->title }}</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <header>
                <h1 class="mb-3 h2">{{ $post->title }}</h1>
                @include('components.share')
                {!! $post->description !!}
            </header>
        </div>
    </div>
    <div class="my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                @forelse ($videos as $video)
                <article class="col" id="post-{{$video->id}}">
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
                            <h2 class="h6 card-title text-muted text-truncate">{{ $video->title }}</h2>
                        </div>
                        <a href="{{ url($video->path) }}" type="button" class="btn btn-danger rounded-0" download>
                            Download ({{ $video->size }})
                        </a>
                    </div>
                </article>
                @empty
                <div class=" p-5 text-center fw-bold border border-danger flex-grow-1 rounded">
                    <p class="m-0 text-danger">No Video found ..!</p>
                </div>
                @endforelse
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    {{ $videos->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection