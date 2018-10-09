@if (count($result) > 0)
    @foreach ($result as $key => $value)
        <div class="suggestion">
            <h5 class="bg-light">{{ strtoupper($key) }}</h5>
            <ul class="suggestions-list">
                @if (count($value) > 0)
                    @foreach ($value as $book)
                        <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                            <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" class="result-link">
                                <div class="media">
                                    <div class="media-left">
                                        @if ($book->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="item" class="media-object" />
                                        @else
                                            <img src="{{ asset(config('view.image_paths.item') . 'default.jpg') }}" alt="woman" class="media-object" />
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $book->title }}</h4>
                                        <p>{{ $book->author }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @else
                    {{ trans('settings.home.not_found') }}
                @endif
            </ul>
        </div>
    @endforeach
@endif
