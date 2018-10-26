@if (count($books) > 0)
    <div class="row">
        @for ($i = 0; $i < count($books); $i++)
            <div class="book-status {{ $status }}" id="{{ $status . $i }}">
                @foreach ($books[$i] as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-wrapper mb-40">
                            <div class="product-img">
                                @if ($item->medias->count() > 0)
                                    <a href="{{ route('books.show', $item->slug . '-' . $item->id) }}">
                                        <img src="{{ asset(config('view.image_paths.book') . $item->medias[0]->path) }}" alt="item" class="primary" />
                                    </a>
                                @else
                                    <img src="{{ asset(config('view.image_paths.item') . 'default.jpg') }}" alt="woman" />
                                @endif
                                <div class="quick-view">
                                    <a class="action-view" href="#" data-target="#productModal{{ $item->id }}" data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        @if ($item->avg_star > 1)
                                            @for ($j = 0; $j < $item->avg_star; $j++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                        @endif
                                    </ul>
                                </div>
                                <h4><a href="{{ route('books.show', $item->slug . '-' . $item->id) }}">{{ $item->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endfor
    </div>
    <div class="pagination-area mt-50">
        <div class="page-number">
            <ul class="pagination">
                <li class="disabled"><a href="#">«</a></li>
                @for ($i = 0; $i < count($books); $i++)
                    <li class="status-page"><a data-target="{{ $status }}" href="{{ '#' . $status . $i }}">{{ $i + 1 }}</a></li>
                @endfor
                <li><a href="#">»</a></li>
            </ul>
        </div>
    </div>
@endif
