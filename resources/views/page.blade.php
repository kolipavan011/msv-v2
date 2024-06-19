@extends('layout')

@section('content')
<main class="main-content">
    <div class="py-4 bg-white">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-nowrap">
                    <li class="breadcrumb-item"><a href="/" class="text-danger">Home</a></li>
                    <li class="breadcrumb-item active text-truncate text-muted" aria-current="page">{{ $article->label }}</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <h1 class="mb-3 h2">{{ $article->title }}</h1>
            {!! $article->description !!}
        </div>
    </div>
    <div class="mb-5 pb-3 bg-white">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection