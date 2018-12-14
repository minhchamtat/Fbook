@if (count($result) > 0)
    @foreach ($result as $key => $value)
        <div class="suggestion-search">
            <ul class="suggestions-list">
                @if (count($value) > 0)
                    @foreach ($value as $book)
                        <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                            <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" class="result-link" title="{{ $book->title }}">
                                <div class="media">
                                    <div class="media-left">
                                        @if ($book->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="item" class="media-search"/>
                                        @else
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="media-search"/>
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-book">{{ $book->title }}</h4>
                                        <p>{{ $book->author }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach                
                @else
                    <div class="search_found"><h5>{{ trans('settings.home.not_found') }}</div>
                @endif
            </ul>
            @if (count($value) == 5)
                <div class="line"></div>
                <div class="suggestion-entern"><a onclick="submitForms()">{{ trans('page.clickMore') }}</a></div>
            @endif
        </div>
        
    @endforeach
@endif
