@extends('layout')

@section('content')
<main class="main-content">
    <div class="py-5 bg-white">
        <div class="container text-center">
            <header>
                <h1 class="mb-3">Mirchi Status Video Download</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere nihil at mollitia ipsa vel. Aut ut doloremque magnam earum odit dignissimos ab nam fuga alias quas ipsum nisi ea dicta quod blanditiis enim expedita quis, architecto accusamus at id, eveniet possimus! Expedita, maiores consectetur tempore corporis accusantium minus quasi facere.</p>
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
                            <img class="bg-secondary w-100 card-img-top lazy" width="360" height="270" data-src="{{ url($post->feature_image) }}" alt="{{$post->title}}" title="{{$post->title}}">
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
    </div>
</main>
@endsection