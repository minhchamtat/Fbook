
@extends('layout.app')

@section('header')
    @parent
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('settings.default.home') }}</a></li>
                            <li><a class="active">{{ __('settings.book.booklist') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
@endsection

@section('content')
<!-- shop-main-area-start -->
<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>{{ __('page.book.showOption') }}</h2>
                    </div>
                    <div class="left-title mb-20">
                        <h4>{{ __('page.book.category') }}</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('book.category', $category->slug . '-' . $category->id) }}" class="{{ isset($cate) && $cate->name == $category->name ? 'active' : '' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="left-title mb-20">
                        <h4>{{ __('page.book.office') }}</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            @foreach ($offices as $office)
                                <li>
                                    <a href="{{ route('book.office', str_slug($office->name)) }}" class="{{ isset($off) && $off == $office->name ? 'active' : '' }}">
                                        {{ $office->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="section-title-5 mb-30">
                    <h2>{{ __('settings.books') }}</h2>
                </div>
                <div class="toolbar mb-30">
                    <div class="shop-tab">
                        <div class="tab-3">
                            <ul>
                                <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>{{ __('settings.grid') }}</a></li>
                                <li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>{{ __('settings.list') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="th">
                        <div class="row">
                            @foreach ($books as $book)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            @if ($book->medias->count() > 0)
                                                <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" class="primary" />
                                                </a>
                                            @else
                                                <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" />
                                                </a>
                                            @endif
                                            <div class="quick-view">
                                                <a class="action-view" href="#" data-target="#productModal{{ $book->id }}" data-toggle="modal" title="Quick View">
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
                                                        'data-rating' => $book->avg_star
                                                    ])
                                                !!}
                                            </div>
                                            <h4><a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" title="{{ $book->title }}">{{ $book->title }}</a></h4>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list">
                        @foreach ($books as $book)
                            <div class="single-shop mb-30">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="product-wrapper-2">
                                            <div class="product-img">
                                                @if ($book->medias->count() > 0)
                                                    <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                                                        <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="book" class="primary" />
                                                    </a>
                                                @else
                                                    <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                                                        <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" />
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="product-wrapper-content">
                                            <div class="product-details">
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
                                                            'data-rating' => $book->avg_star
                                                        ])
                                                    !!}
                                                </div>
                                                <h4><a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" title="{{ $book->title }}">{{ $book->title }}</a></h4>
                                                @php $str = preg_replace('/ style=("|\')(.*?)("|\')/', '', $book->description) @endphp
                                                @if (strlen($str) > 200)
                                                    {!! mb_substr($str, 0, 200) . '...' !!}
                                                @else
                                                    {!! $book->description !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- tab-area-end -->
                <!-- pagination-area-start -->
                <div class="pagination-area mt-50">
                    <div class="list-page-2">
                        <p>
                            {{ __('settings.showing')  }}
                            {{ ($books->currentpage() - 1) * $books->perpage() + 1 }} {{ __('settings.to') }} {{ ($books->currentpage() - 1) * $books->perpage() + $books->count() }} {{ __('settings.of') }} {{ $books->total() }} {{ __('settings.items') }}
                        </p>
                    </div>
                    <div class="page-numbers">
                        {{ $books->links() }}
                    </div>
                </div>
                <!-- pagination-area-end -->
            </div>
        </div>
    </div>
</div>
<!-- shop-main-area-end -->
@foreach ($books as $book)
    @include('layout.section.modal')
@endforeach

@endsection

@section('footer')
    @parent
@endsection
