@extends('layout.app')

@section('header')
    @parent
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ asset('/') }}">{{ trans('settings.default.home') }}</a></li>
                            <li><a class="active">{{ trans('settings.book.detail_book') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="product-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="product-main-area">
                    @if($book)
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="flexslider">
                                @if($book->medias)
                                <ul class="slides">
                                    <li data-thumb="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}">
                                      <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="woman" />
                                    </li>
                                    <li data-thumb="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}">
                                      <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="woman" />
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                            <div class="product-info-main">
                                <div class="page-title">
                                    <h1>{{ $book->title }}</h1>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span>{{ trans('settings.book.author') }}</span>
                                    <div class="product-attribute">
                                        <span>{{ $book->author }}</span>
                                    </div>
                                </div>
                                <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        @if($book->avg_star > 1)
                                            @for($i = 1; $i < $book->avg_star; $i++)
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            @endfor
                                        @endif
                                    </div>
                                    <div class="reviews-actions">
                                        <a href="#">{{ trans('settings.book.reviews', ['avg' => $book->avg_star]) }}</a>
                                    </div>
                                </div>
                                <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        {{ trans('settings.book.categories') }}
                                    </div>
                                    <div class="reviews-actions">
                                        @if($book->categories)
                                            @foreach($book->categories as $category)
                                                <span>{{ $category->name }}</span><br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                 <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        {{ trans('settings.book.owners') }}
                                    </div>
                                    <div class="reviews-actions">
                                        @if($book->owners)
                                            @foreach($book->owners as $owner)
                                                <a href="{{ '/users' . $owner->id }}"><span>{{ $owner->name }}</span></a><br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="product-add-form">
                                    <form action="#">
                                        <a href="#">{{ trans('settings.book.borrow_book') }}</a>
                                        <a href="#">{{ trans('settings.book.i_have_this_book') }}</a>
                                    </form>
                                </div>
                                <div class="product-social-links">
                                    <div class="product-addto-links">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-pie-chart"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                                    </div>
                                    <div class="product-addto-links-text">
                                        <div class="more">{!! $book->description !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="product-info-area mt-80">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#Details" data-toggle="tab">{{ trans('settings.book.review') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="Details">
                            <div class="row event-list">
                                <div class="col-xs-12 col-sm-8 col-md-12 revsdv fix" id="load-data">
                                    @if($reviews->count() > 0)
                                        @foreach ($reviews as $review)
                                            <div class="event-item wow fadeInRight comment-box">
                                                <div class="well padding5 owner-clear relative-position">
                                                    <div class="media padding5">
                                                        <div class="medialeft">
                                                            <a href="" class="avatar"><img src="/{{ config('view.image_paths.user') . $review->user->avatar }}" class="media-object" alt="avatar"></a>
                                                        </div>
                                                        <div class="media-body relative-position">
                                                            <div class="content-comment">
                                                                <div class="show tip-left">
                                                                    <strong>{{ $review->user->name }}</strong>
                                                                    <i>{{ $review->created_at }}</i>
                                                                    @if($review->user == Auth::user())
                                                                        <div class="action">
                                                                            <a href="{{ route('review.edit', [$book->slug . '-' . $book->id, $review->id]) }}" class="btn btn-info btn-sm a-btn-slide-text">
                                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                                            </a>
                                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['review.destroy', $book->slug . '-' . $book->id, $review->id], 'id' => "$review->id"]) !!}
                                                                                {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger m-btn m-btn--custom btn-9 btn-sm', 'type' => 'submit', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                                            {!! Form::close() !!}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <h4 class="media-heading list-inline list-unstyled rating-star m-0">
                                                                    @for($i = 1; $i <= $review->star; $i++)
                                                                        <li class="active"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    @endfor
                                                                    @for($j = 1; $j <= 5 - ($review->star); $j++)
                                                                        <li class=""><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    @endfor
                                                                </h4>
                                                                <p class="m-0">{{ $review->title }}</p>
                                                                <div class="custom-vote">
                                                                    <div class="float-right">
                                                                        <div class="vote">
                                                                            <p class="no-margin">
                                                                                <i class="fa fa-caret-up" aria-hidden="true"></i>
                                                                            </p>
                                                                            <p class="no-margin mtop">
                                                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                                            </p>
                                                                        </div>
                                                                        <div class="count-voted">
                                                                            <span>0</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ route('review.show', [$book->slug . '-' . $book->id, $review->id]) }}" class="view_more"><i class="fa fa-eye" aria-hidden="true"></i> View More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">
                                            {{ __('page.reviews.noReview') }}
                                        </div>
                                    @endif
                                    @if ($flag == true)
                                        <div class="button">
                                            <a href="{{ route('review.create', $book->slug . '-' . $book->id) }}" class="btn btn-primary"> Add Review</a>
                                        </div>
                                    @endif
                                    @if(!Auth::check())
                                        <div class="alert alert-success">
                                            {{ __('page.reviews.sign') }}
                                            <b><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-book-area mt-60">
                    <div class="section-title text-center mb-30">
                        <h3>upsell products</h3>
                    </div>
                    <div class="tab-active-2 owl-carousel">
                        @if($relatedBooks)
                            @for($i = 3; $i < count($relatedBooks); $i++)
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="{{ asset(config('view.image_paths.book') . $relatedBooks[$i]->medias[0]->path) }}" alt="book" class="primary" />
                                        </a>
                                        <div class="quick-view">
                                            <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="product-flag">
                                            <ul>
                                                <li><span class="sale">{{ trans('settings.book.new') }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-details text-center">
                                        <div class="product-rating">
                                            <ul>
                                                @if($relatedBooks[$i]->avg_star > 1)
                                                    @for($j = 1; $j < $relatedBooks[$i]->avg_star; $j++)
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    @endfor
                                                @endif
                                            </ul>
                                        </div>
                                        <h4><a href="{{ '/books/' . $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id}}">{{ $relatedBooks[$i]->title }}</a></h4>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="shop-left">
                    <div class="left-title mb-20">
                        <h4>{{ trans('settings.book.related_books') }}</h4>
                    </div>
                    <div class="random-area mb-30">
                        <div class="product-active-2 owl-carousel">
                            <div class="product-total-2">
                                @if($relatedBooks)
                                    @for($i = 0; $i < 3; $i++)
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="#"><img src="{{ asset(config('view.image_paths.book') . $relatedBooks[$i]->medias[0]->path) }}" alt="book" /></a>
                                            </div>
                                            <div class="most-product-content">
                                                <div class="product-rating">
                                                    <ul>
                                                        @if($relatedBooks[$i]->avg_star > 1)
                                                            @for($j = 1; $j < $relatedBooks[$i]->avg_star; $j++)
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            @endfor
                                                        @endif
                                                    </ul>
                                                </div>
                                                <h4><a href="{{ '/books/' . $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id}}">{{ $relatedBooks[$i]->title }}</a></h4>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="banner-area mb-30">
                        <div class="banner-img-2">
                            <a href="#"><img src="{{ asset('assets/img/banner/33.jpg') }}" alt="banner" /></a>
                        </div>
                    </div>
                    <div class="left-title-2 mb-30">
                        <h2>Compare Products</h2>
                        <p>You have no items to compare.</p>
                    </div>
                    <div class="left-title-2">
                        <h2>My Wish List</h2>
                        <p>You have no items in your wish list.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
