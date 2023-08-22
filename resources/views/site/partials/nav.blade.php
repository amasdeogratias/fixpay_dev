<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    @foreach ($category->items as $cat)
                        @if ($cat->items->count() > 0)
                            <li class="nav-item dropdown">
                                <a 
                                    href="{{ route('category.show', $cat->slug) }}" 
                                    class="nav-link dropdown-toggle" 
                                    id="{{ $category->slug }}" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $cat->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="{{ $cat->slug }}">
                                    @foreach ($cat->items as $item)
                                        <a href="{{ route('category.show', $item->slug) }}" class="dropdown-item">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </li> 
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</nav>
