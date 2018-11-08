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
                            @if ($tmp)
                                <li><a href="{{ route('book.edit', $book->id) }}"
                                       class="btn btn-info mb-4">{{ __('settings.book.edit') }}</a></li>
                            @endif
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
                        @if ($book)
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <div class="flexslider">
                                        @if ($book->medias->count() > 0)
                                            <ul class="slides">
                                                <li data-thumb="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}"
                                                         alt="woman"/>
                                                </li>
                                                <li data-thumb="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}"
                                                         alt="woman"/>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="slides">
                                                <li data-thumb="{{ asset(config('view.image_paths.book') . 'default.jpg') }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}"
                                                         alt="woman"/>
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
                                            <div class="reviews-actions">
                                                <a href="#review"
                                                   id="review">{{ trans('settings.book.reviews', ['avg' => count($book->reviews)]) }}</a>
                                            </div>
                                        </div>
                                        <div class="product-reviews-summary">
                                            <div class="rating-summary">
                                                {{ trans('settings.book.categories') }}
                                            </div>
                                            <div class="reviews-actions">
                                                @if ($book->categories)
                                                    @foreach ($book->categories as $category)
                                                        <span>{{ $category->name }}</span><br>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-reviews-summary owner-list">
                                            <div class="rating-summary">
                                                {{ trans('settings.book.owners') }}
                                            </div>
                                            @if ($book->owners)
                                                @foreach ($book->owners as $owner)
                                                    <div class="reviews-actions" id="{{ 'user-' . $owner->id }}">
                                                        <a href="{{ route('user', $owner->id) }}"
                                                           title="{{ $owner->name }}">
                                                            @if ($owner->avatar != '')
                                                                <img src="{{ $owner->avatar }}"
                                                                     class="mg-thumbnail avatar-icon">
                                                            @else
                                                                <img src="{{ asset(config('view.image_paths.user') . '1.png') }}"
                                                                     class="mg-thumbnail avatar-icon">
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="product-add-form">
                                            @auth
                                                @if ($book->owners->count() > 0)
                                                    <form>
                                                        @if ($isBooking)
                                                            <a data-toggle="modal" data-id="{{ $book->id }}"
                                                               class="btn-cancel-borrowing">{{ trans('settings.book.cancel_borrowing') }}</a>
                                                        @else
                                                            <a data-toggle="modal" href="#borrowingModal"
                                                               data-id="{{ $book->id }}"
                                                               class="btn-borrow">{{ trans('settings.book.borrow_book') }}</a>
                                                        @endif
                                                        @if ($isOwner)
                                                            <a data-toggle="modal" class="btn-remove-owner"
                                                               data-id="{{ $book->id }}" href="#"
                                                               owner="{{ Auth::id() }}">{{ trans('settings.book.remove_owner') }}</a>
                                                        @else
                                                            <a data-toggle="modal" class="btn-share"
                                                               data-id="{{ $book->id }}" href="#"
                                                               owner="{{ Auth::id() }}">{{ trans('settings.book.i_have_this_book') }}</a>
                                                        @endif
                                                    </form>
                                                @else
                                                    <form>
                                                        @if ($isOwner)
                                                            <a data-toggle="modal" class="btn-remove-owner"
                                                               data-id="{{ $book->id }}" href="#"
                                                               owner="{{ Auth::id() }}">{{ trans('settings.book.remove_owner') }}</a>
                                                        @else
                                                            <a data-toggle="modal" class="btn-share"
                                                               data-id="{{ $book->id }}" href="#"
                                                               owner="{{ Auth::id() }}">{{ trans('settings.book.i_have_this_book') }}</a>
                                                        @endif
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                        <div class="product-social-links">
                                            <div class="product-addto-links">
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-pie-chart"></i></a>
                                                <a href="#"><i class="fa fa-envelope-o"></i></a>
                                            </div>
                                            <div class="product-addto-links-text">
                                                <div class="more">{!! ($book->description) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="product-info-area mt-80">
                        @auth
                            <ul class="nav nav-tabs detail-tabs" role="tablist" data-id="{{ $book->id }}">
                                <li class="active"><a href="#reviews"
                                                      data-toggle="tab">{{ trans('settings.book.review') }}</a></li>
                                <li><a href="#waiting" data-toggle="tab">{{ trans('settings.book.waiting') }}</a></li>
                                <li><a href="#reading" data-toggle="tab">{{ trans('settings.book.reading') }}</a></li>
                                <li><a href="#returning" data-toggle="tab">{{ trans('settings.book.returning') }}</a>
                                </li>
                                <li><a href="#returned" data-toggle="tab">{{ trans('settings.book.returned') }}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="reviews" status="done">
                                    <div class="row event-list">
                                        <div class="col-xs-12 col-sm-8 col-md-12 revsdv fix" id="load-data">
                                            @if ($reviews->count() > 0)
                                                @foreach ($reviews as $review)
                                                    <div class="event-item wow fadeInRight comment-box">
                                                        <div class="well padding5 owner-clear relative-position">
                                                            <div class="media padding5">
                                                                <div class="medialeft">
                                                                    @if ($review->user->avatar != '')
                                                                        <a href="{{ route('user', $review->user->id) }}"
                                                                           class="avatar">
                                                                            <img src="{{ $review->user->avatar }}"
                                                                                 class="img-thumbnail avatar-icon"
                                                                                 alt="avatar"></a>
                                                                    @else
                                                                        <a href="{{ route('user', $review->user->id) }}"
                                                                           class="avatar"><img
                                                                                    src="{{ asset(config('view.image_paths.user') . '1.png') }}"
                                                                                    class="img-thumbnail avatar-icon"></a>
                                                                    @endif
                                                                </div>
                                                                <div class="media-body relative-position">
                                                                    <div class="content-comment">
                                                                        <div class="show tip-left">
                                                                            <strong>{{ $review->user->name }}</strong>
                                                                            <i>{{ $review->updated_at }}</i>
                                                                            @if ($review->user->id == Auth::id())
                                                                                <div class="action">
                                                                                    <a href="{{ route('review.edit', [$book->slug . '-' . $book->id, $review->id]) }}"
                                                                                       class="btn btn-info btn-sm a-btn-slide-text">
                                                                                        <i class="fa fa-edit"
                                                                                           aria-hidden="true"></i>
                                                                                    </a>
                                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['review.destroy', $book->slug . '-' . $book->id, $review->id], 'id' => "$review->id"]) !!}
                                                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger m-btn m-btn--custom btn-9 btn-sm notify', 'type' => 'submit']) !!}
                                                                                    {!! Form::close() !!}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <h4 class="media-heading list-inline list-unstyled rating-star m-0">
                                                                            @for ($i = 1; $i <= ($review->star); $i++)
                                                                                <li class="active"><i class="fa fa-star"
                                                                                                      aria-hidden="true"></i>
                                                                                </li>
                                                                            @endfor
                                                                            @for ($j = 1; $j <= 5 - ($review->star); $j++)
                                                                                <li class=""><i class="fa fa-star"
                                                                                                aria-hidden="true"></i>
                                                                                </li>
                                                                            @endfor
                                                                        </h4>
                                                                        <p class="m-0">{{ $review->title }}</p>
                                                                        <div class="custom-vote">
                                                                            <div class="float-right">
                                                                                <div class="vote">
                                                                                    <p class="no-margin">
                                                                                        <i class="fa fa-caret-up"
                                                                                           aria-hidden="true"></i>
                                                                                    </p>
                                                                                    <p class="no-margin mtop">
                                                                                        <i class="fa fa-caret-down"
                                                                                           aria-hidden="true"></i>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="count-voted">
                                                                                    <span>{{ $review->upvote - $review->downvote }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a href="{{ route('review.show', [$book->slug . '-' . $book->id, $review->id]) }}"
                                                                           class="view_more {{ Auth::check() ? '' : 'login' }}"><i
                                                                                    class="fa fa-eye"
                                                                                    aria-hidden="true"></i> View
                                                                            More</a>
                                                                    </div>
                                                                    <a href="{{ route('review.show', [$book->slug . '-' . $book->id, $review->id]) }}" class="view_more {{ Auth::check() ? '' : 'login' }}">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        {{ __('settings.review.viewMore') }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                {{ $reviews->links() }}
                                            @else
                                                <div class="alert alert-info">
                                                    {{ __('page.reviews.noReview') }}
                                                </div>
                                            @endif
                                            @if ($flag == true)
                                                <div class="button">
                                                    <a href="{{ route('review.create', $book->slug . '-' . $book->id) }}"
                                                       class="btn btn-primary">{{ __('settings.review.add') }}</a>
                                                </div>
                                            @endif
                                            @if (!Auth::check())
                                                <div class="alert alert-success">
                                                    {{ __('page.reviews.sign') }}
                                                    <b><a class="nav-link"
                                                          href="{{ route('login') }}">{{ __('Login') }}</a></b>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="waiting" status="none">
                                </div>
                                <div class="tab-pane" id="reading" status="none">
                                </div>
                                <div class="tab-pane" id="returning" status="none">
                                </div>
                                <div class="tab-pane" id="returned" status="none">
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="shop-left">
                        @if (isset($relatedBooks) && $relatedBooks->count() > 0 && $relatedBooks->count() > 2)
                            <div class="left-title mb-20">
                                <h4>{{ trans('settings.book.related_books') }}</h4>
                            </div>
                            <div class="random-area mb-30">
                                <div class="product-active owl-carousel">
                                    <div class="product-total-2">
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="single-most-product bd mb-18">
                                                @if ($relatedBooks[$i]->medias->count() > 0)
                                                    <div class="most-product-img">
                                                        <a href="{{ route('books.show', $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id) }}">
                                                            <img src="{{ asset(config('view.image_paths.book') . $relatedBooks[$i]->medias[0]->path) }}"
                                                                 alt="book"/>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="most-product-img">
                                                        <a href="{{ route('books.show', $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id) }}">
                                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}"
                                                                 alt="woman"/>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="most-product-content">
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
                                                                'data-rating' => $relatedBooks[$i]->avg_star
                                                            ])
                                                        !!}
                                                    </div>
                                                    <h4>
                                                        <a href="{{ route('books.show', ['id' => $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id]) }}">{{ $relatedBooks[$i]->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="new-book-area mt-60">
                        @if (isset($relatedBooks) && $relatedBooks->count() >= 3)
                            <div class="section-title text-center mb-30 text-uppercase">
                                <h3>{{ __('page.book.upsell') }}</h3>
                            </div>
                            <div class="tab-active-2 owl-carousel">
                                @for ($i = 3; $i < $relatedBooks->count(); $i++)
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            @if ($relatedBooks[$i]->medias->count() > 0)
                                                <a href="{{ route('books.show', $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . $relatedBooks[$i]->medias[0]->path) }}"
                                                         alt="book" class="primary"/>
                                                </a>
                                            @else
                                                <a href="{{ route('books.show', $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id) }}">
                                                    <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}"
                                                         alt="woman"/>
                                                </a>
                                            @endif
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
                                                        'data-rating' => $relatedBooks[$i]->avg_star
                                                    ])
                                                !!}
                                            </div>
                                            <h4>
                                                <a href="{{ route('books.show', ['id' => $relatedBooks[$i]->slug . '-' . $relatedBooks[$i]->id]) }}">{{ $relatedBooks[$i]->title }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="borrowingModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">{{ trans('settings.modal.close') }}</button>
                    <h4 class="modal-title">{{ trans('settings.modal.borrow_book') }}</h4>
                </div>
                {!! Form::open([
                        'method' => 'POST',
                        'id' => 'borrowingForm',
                        'class' => 'form-groupt',
                        'data-id' => $book->id,
                    ]) !!}
                <div class="modal-body row">
                    <div class="owner-input">
                        @if ($book->owners)
                            @foreach ($book->owners as $owner)
                                <div class="col-xs-12 col-sm-12" id="owner{{ $owner->id }}">
                                    {!! Form::radio(
                                        'owner_id',
                                        $owner->id,
                                        [
                                            'required' => 'required',
                                        ]
                                    ) !!}
                                    {{ $owner->name }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-8">
                        {{ trans('settings.modal.choose_time_to_borrow') }}
                    </div>
                    <div class="col-lg-4">
                        {!! Form::selectRange('days_to_read', 3, 30) !!}
                        {{ trans('settings.modal.days') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" class="btn">{{ trans('settings.modal.btn_close') }}</a>
                    {!! Form::submit(
                        trans('settings.modal.btn_submit'),
                        [
                            'class' => 'btn btn-primary',
                        ]
                    )!!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
