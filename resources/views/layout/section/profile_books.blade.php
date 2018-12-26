@if (count($books) > 0)
<div class="row">
    @foreach ($books as $item)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product-wrapper mb-40">
            <div class="product-img">
                @if ($item->medias->count() > 0)
                <a href="{{ route('books.show', $item->slug . '-' . $item->id) }}">
                    <img src="{{ asset(config('view.image_paths.book') . $item->medias[0]->path) }}" alt="item" class="primary" />
                </a>
                @else
                <a href="{{ route('books.show', $item->slug . '-' . $item->id) }}">
                    <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" />
                </a>
                @endif
                <div class="quick-view">
                    <a class="action-view" href="#" data-target="#productModal{{ $item->id }}" data-toggle="modal" title="Quick View">
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
                        'data-rating' => $item->avg_star
                    ])
                    !!}
                </div>
                <h4><a href="{{ route('books.show', $item->slug . '-' . $item->id) }}" title="{{ $item->title }}">{{ $item->title }}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($books as $book)
    @include('layout.section.modal')
    @endforeach
</div>
@endif
