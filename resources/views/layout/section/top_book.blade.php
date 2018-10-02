<div class="product-wrapper">
    <div class="product-img">
        @if ($book->medias->count() > 0)
            <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" class="primary" />
            </a>
        @else
            <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
            </a>
        @endif
        <div class="quick-view">
            <a class="action-view" href="#" data-target="#productModal{{ $book->id }}" data-toggle="modal" title="Quick View">
                <i class="fa fa-search-plus"></i>
            </a>
        </div>
    </div>
    <div class="product-details text-center">
        <div class="product-rating">
            <ul>
                @if($book->avg_star > 1)
                    @for($i = 1; $i <= $book->avg_star; $i++)
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    @endfor
                @endif
            </ul>
        </div>
        <h4><a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">{{ $book->title }}</a></h4>
    </div>
</div>
