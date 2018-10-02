@if(isset($latestBook) && !empty($latestBook))
    @for($i = 0; $i < count($latestBook); $i++)
        <div class="tab-total">
            <div class="product-wrapper mb-40">
                <div class="product-img">
                    @if($latestBook[$i]->medias->count() > 0)
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $latestBook[$i]->medias[0]->path) }}" alt="book" class="primary" />
                        </a>
                    @else
                       <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                        </a>
                    @endif
                    <div class="quick-view">
                        <a class="action-view" href="#" data-target="#productModal{{ $latestBook[$i]->id }}" data-toggle="modal" title="Quick View">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="product-details text-center">
                    <div class="product-rating">
                        <ul>
                            @if($latestBook[$i]->avg_star > 1)
                                @for($j = 1; $j <= $latestBook[$i]->avg_star; $j++)
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                    <h4><a href="{{ '/books/' . $latestBook[$i]->slug . '-' . $latestBook[$i]->id }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    @if($latestBook[$i++]->medias->count() > 0)
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $latestBook[++$i]->medias[0]->path) }}" alt="book" class="primary" />
                        </a>
                    @else
                        <a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                        </a>
                    @endif
                    <div class="quick-view">
                        <a class="action-view" href="#" data-target="#productModal{{ $latestBook[$i]->id }}" data-toggle="modal" title="Quick View">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="product-details text-center">
                    <div class="product-rating">
                        <ul>
                            @if($latestBook[$i]->avg_star > 1)
                                @for($j = 1; $j <= $latestBook[$i]->avg_star; $j++)
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                    <h4><a href="{{ '/books/' . $latestBook[$i]->slug . '-' . $latestBook[$i]->id }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
        </div>
    @endfor
@endif
