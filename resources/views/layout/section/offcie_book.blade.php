@if($item['books'])
    <div class="product-total-2">
        @foreach($item['books'] as $book)
            <div class="single-most-product bd mb-18 office-book">
                <div class="most-product-img">
                    <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                        @if($book->medias->count() > 0)
                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" class="office-book-img" />
                        @else
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="office-book-img" />
                        @endif
                    </a>
                </div>
                <div class="most-product-content">
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
        @endforeach
    </div>
@endif
