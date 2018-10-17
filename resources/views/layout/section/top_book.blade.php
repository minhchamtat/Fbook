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
                @for ($k = 1; $k < $book->avg_star; $k++)
                    <li><i class="fa fa-star"></i></li>
                @endfor

                @if (strpos($book->avg_star, '.'))
                    <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                    @php $k++ @endphp
                @endif

                @while ($k <= 5)
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    @php $k++ @endphp
                @endwhile
            </ul>
        </div>
        <h4><a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">{{ $book->title }}</a></h4>
    </div>
</div>
