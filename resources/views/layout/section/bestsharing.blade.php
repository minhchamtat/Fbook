@if(isset($bestSharing) && !empty($bestSharing))
    @for ($i = 1; $i < count($bestSharing) - 1; $i++)
        <div class="bestseller-total">
            <div class="single-bestseller mb-25">
                @if($bestSharing[$i]->medias->count() > 0)
                    <div class="bestseller-img">
                        <a href="{{ route('books.show', $bestSharing[$i]->slug . '-' . $bestSharing[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $bestSharing[$i]->medias[0]->path) }}" alt="book" />
                        </a>
                    </div>
                @else
                    <ul class="slides">
                        <li data-thumb="{{ asset(config('view.image_paths.book') . 'default.jpg') }}"></li>
                    </ul>
                @endif
                <div class="bestseller-text text-center">
                    <h3>
                        <a href="{{ route('books.show', $bestSharing[$i]->slug . '-' . $bestSharing[$i]->id) }}" title="{{ $bestSharing[$i]->title }}">
                            {{ $bestSharing[$i]->title }}
                        </a>
                    </h3>
                </div>
            </div>
            <div class="single-bestseller">
                @if($bestSharing[++$i]->medias->count() > 0)
                    <div class="bestseller-img">
                        <a href="{{ route('books.show', $bestSharing[$i]->slug . '-' . $bestSharing[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $bestSharing[$i]->medias[0]->path) }}" alt="book" />
                        </a>
                    </div>
                @else
                    <a href="{{ route('books.show', $bestSharing[$i]->slug . '-' . $bestSharing[$i]->id) }}">
                        <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                    </a>
                @endif
                <div class="bestseller-text text-center">
                    <h3>
                        <a href="{{ route('books.show', $bestSharing[$i]->slug . '-' . $bestSharing[$i]->id) }}" title="{{ $bestSharing[$i]->title }}">
                            {{ $bestSharing[$i]->title }}
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    @endfor
@endif
