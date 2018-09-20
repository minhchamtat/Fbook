@extends('layout.app')

@section('header')
    @parent
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">{{ trans('settings.default.home') }}</a></li>
                            <li><a href="#" class="active">{{ trans('settings.book.detail_book') }}</a></li>
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
                                    <li data-thumb="{{ asset(config('view.image_paths.product') . $book->medias[0]->path) }}">
                                      <img src="{{ asset(config('view.image_paths.product') . $book->medias[0]->path) }}" alt="woman" />
                                    </li>
                                    <li data-thumb="{{ asset(config('view.image_paths.product') . $book->medias[0]->path) }}">
                                      <img src="{{ asset(config('view.image_paths.product') . $book->medias[0]->path) }}" alt="woman" />
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
                                        <p class="more">{{ $book->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="product-info-area mt-80">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#" data-toggle="tab">{{ trans('settings.book.detail') }}</a></li>
                        <li><a href="#Reviews" data-toggle="tab">{{ trans('settings.book.review') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="Details">
                            <div class="valu">
                              <p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it's ideal for athletes with places to go.</p>
                              <ul>
                                <li><i class="fa fa-circle"></i>Dual top handles.</li>
                                <li><i class="fa fa-circle"></i>Adjustable shoulder strap.</li>
                                <li><i class="fa fa-circle"></i>Full-length zipper.</li>
                                <li><i class="fa fa-circle"></i>L 29" x W 13" x H 11".</li>
                              </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="Reviews">
                            <div class="valu valu-2">
                                <div class="section-title mb-60 mt-60">
                                    {{-- review --}}
                                </div>
                                <div class="review-form">
                                    <div class="single-form single-form-2">
                                        <label>{{ trans('settings.review.rating') }}<sup>*</sup></label>
                                        <form action="#">
                                            <div>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="single-form single-form-2">
                                        <label>{{ trans('settings.review.summary') }}<sup>*</sup></label>
                                        <form action="#">
                                            <input type="text" />
                                        </form>
                                    </div>
                                    <div class="single-form">
                                        <label>{{ trans('settings.book.review') }}<sup>*</sup></label>
                                        <form action="#">
                                            <textarea name="massage" cols="10" rows="4"></textarea>
                                        </form>
                                    </div>
                                </div>
                                <div class="review-form-button">
                                    <a href="#">{{ trans('settings.default.submit') }}</a>
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
                                            <img src="{{ asset(config('view.image_paths.product') . $relatedBooks[$i]->medias[0]->path) }}" alt="book" class="primary" />
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
                                                <a href="#"><img src="{{ asset(config('view.image_paths.product') . $relatedBooks[$i]->medias[0]->path) }}" alt="book" /></a>
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
