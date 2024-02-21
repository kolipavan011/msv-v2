<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="/">Mirchi Status Video</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @foreach ($sidebar['navigation'] as $link)
                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-bold" href="{{ route('category',['slug'=> $link->slug]) }}">
                            {{ $link->label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>