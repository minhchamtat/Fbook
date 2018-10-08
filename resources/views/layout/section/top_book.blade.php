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
                @for ($i = 0; $i < $book->avg_star; $i++)
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                @endfor
                @for ($j = 0; $j < 5 - $book->avg_star; $j++)
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                @endfor
            </ul>
        </div>
        <h4><a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">{{ $book->title }}</a></h4>
    </div>
</div>
