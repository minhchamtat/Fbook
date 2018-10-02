@if($item['books'])
    <div class="product-total-2">
        @foreach($item['books'] as $book)
            <div class="single-most-product bd mb-18">
                @if($book->medias->count() > 0)
                    <div class="most-product-img">
                        <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}"><img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" /></a>
                    </div>
                @else
                    <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                        <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                    </a>
                @endif
                <div class="most-product-content">
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
        @endforeach
    </div>
@endif
