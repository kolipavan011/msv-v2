@extends('layout')

@section('content')
<main class="main-content">
    <div class="py-4 bg-white">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-nowrap">
                    <li class="breadcrumb-item"><a href="/" class="text-danger">Home</a></li>
                    <li class="breadcrumb-item active text-truncate text-muted" aria-current="page">Lorem ipsum dolor sit amet. {{ $archive->label }}</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <header>
                <h1 class="mb-3 h2">{{ $archive->title }}</h1>
                @include('components.share')
                {!! $archive->description !!}
            </header>
        </div>
    </div>
    <div class="my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                @forelse ($posts as $post)
                <article class="col" id="post-{{$post->id}}">
                    <div class="card h-100">
                        @isset($post->feature_image)
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{$post->title}}">
                            <img class="bg-secondary w-100 card-img-top lazy" width="360" height="270" data-src="{{ url($post->feature_image) }}" alt="{{$post->title}}" title="{{$post->title}}">
                        </a>
                        @endisset
                        <div class="card-body">
                            <a href="{{ route('post', ['slug' => $post->slug]) }}">
                                <h2 class="h5 card-title text-dark">{{ $post->title }}</h2>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class=" p-5 text-center fw-bold border border-danger flex-grow-1 rounded">
                    <p class="m-0 text-danger">No posts found ..!</p>
                </div>
                @endforelse
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    {!! $archive->body !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection