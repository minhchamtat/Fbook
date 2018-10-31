@if(isset($latestBook) && !empty($latestBook))
    @for($i = 0; $i < count($latestBook) - 1; $i++)
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
                        {!! Form::select('rating',
                           [
                                '' => '',
                                '1' => 1,
                                '2' => 2,
                                '3' => 3,
                                '4' => 4,
                                '5' => 5
                            ],
                            null,
                            [
                                'class' => 'rating',
                                'data-rating' => $latestBook[$i]->avg_star
                            ])
                        !!}
                    </div>
                    <h4><a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}" title="{{ $latestBook[$i]->title }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    @if ($latestBook[++$i]->medias->count() > 0)
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
                        {!! Form::select('rating',
                           [
                                '' => '',
                                '1' => 1,
                                '2' => 2,
                                '3' => 3,
                                '4' => 4,
                                '5' => 5
                            ],
                            null,
                            [
                                'class' => 'rating',
                                'data-rating' => $latestBook[$i]->avg_star
                            ])
                        !!}
                    </div>
                    <h4><a href="{{ route('books.show', $latestBook[$i]->slug . '-' . $latestBook[$i]->id) }}" title="{{ $latestBook[$i]->title }}">{{ $latestBook[$i]->title }}</a></h4>
                </div>
            </div>
        </div>
    @endfor
@endif
