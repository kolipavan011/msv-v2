<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container justify-content-md-bewteen justify-content-center">
            <a class="navbar-brand" href="/">
                <img height="30px" src="/img/logo.jpg" alt="mirchi status logo">
            </a>
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