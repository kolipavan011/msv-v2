<aside>
    <div class="bg-white">
        <div class="container">
            <div class="row d-flex row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 gy-4 mb-4">
                <!-- Category widget -->
                <div class="col">
                    <h2 class="mb-3 h4 text-muted">CATEGORIES</h2>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($sidebar['categories'] as $category)
                        <a href="{{ route('category', ['slug' => $category->slug]) }}" class="btn btn-outline-danger btn-sm" title="{{$category->title}}">{{$category->label}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- tags widget -->
                <div class="col">
                    <h2 class="mb-3 h4 text-muted">TAGS</h2>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($sidebar['tags'] as $tag)
                        <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="btn btn-outline-danger btn-sm" title="{{$tag->title}}">{{$tag->label}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- pages widget -->
                <div class="col">
                    <h2 class="mb-3 h4 text-muted">PAGES</h2>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($sidebar['pages'] as $page)
                        <a href="{{ route('page', ['slug' => $page->slug]) }}" class="btn btn-outline-danger btn-sm" title="{{$page->title}}">{{$page->label}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- pages widget -->
                <div class="col">
                    <h2 class="mb-3 h4 text-muted">ABOUT US</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic aspernatur unde maiores corporis saepe natus laborum? Deleniti dolores accusamus nesciunt eos consequatur, esse corrupti saepe delectus dicta quibusdam itaque vero.</p>
                </div>
            </div>
        </div>
    </div>
</aside>