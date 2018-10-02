@if(isset($bestSharing) && !empty($bestSharing))
    @foreach ($bestSharing as $book)
        <div class="bestseller-total">
            <div class="single-bestseller mb-25">
                @if($book->medias->count() > 0)
                    <div class="bestseller-img">
                        <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}"><img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" /></a>
                    </div>
                @else
                    <ul class="slides">
                        <li data-thumb="{{ asset(config('view.image_paths.book') . 'default.jpg') }}"></li>
                    </ul>
                @endif
                <div class="bestseller-text text-center">
                    <h3> <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">{{ $book->title }}</a></h3>
                </div>
            </div>
            <div class="single-bestseller">
                @if($book->medias->count() > 0)
                    <div class="bestseller-img">
                        <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}"><img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" /></a>
                    </div>
                @else
                    <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                        <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                    </a>
                @endif
                <div class="bestseller-text text-center">
                    <h3> <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">{{ $book->title }}</a></h3>
                </div>
            </div>
        </div>
    @endforeach
@endif
