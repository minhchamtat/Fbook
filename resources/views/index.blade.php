@extends('layout.app')

@section('header')
    @parent
    <div class="banner-area banner-res-large ptb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="banner-text">
                            <h4>{{ __('settings.default.totalMember') }}</h4>
                            <p>{{ $totalUser->count() }} {{__('settings.default.members') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="banner-text">
                            <h4>{{ __('settings.default.totalBook') }}</h4>
                            <p>{{ $totalBook }} {{__('settings.default.books') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                        </div>
                        <div class="banner-text">
                            <h4>{{ __('settings.default.totalReview') }}</h4>
                            <p>{{ $totalReview }} {{__('settings.default.reviews') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="single-banner mrg-none-xs">
                        <div class="banner-img">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="banner-text">
                            <h4>{{ __('settings.default.help') }}</h4>
                            <p>{{ __('settings.default.call') }} : 84-4-3795-5417</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.slider')
@endsection

@section('content')
<div class="product-area pt-95 xs-mb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>{{ trans('settings.home.top_interesting') }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-menu mb-40 text-center">
                    <ul>
                        <li class="active"><a href="#Audiobooks" data-toggle="tab">{{ trans('settings.home.top_rating') }}</a></li>
                        <li><a href="#books" data-toggle="tab">{{ trans('settings.home.top_review') }}</a></li>
                        <li><a href="#bussiness" data-toggle="tab">{{ trans('settings.home.top_view') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="Audiobooks">
                <div class="tab-active owl-carousel">
                    @if (isset($topInteresting) && !empty($topInteresting))
                        @foreach($topInteresting as $book)
                            @include('layout.section.top_book')
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="books">
                <div class="tab-active owl-carousel">
                    @if (isset($topReview) && !empty($topReview))
                        @foreach($topReview as $book)
                            @include('layout.section.top_book')
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="bussiness">
                <div class="tab-active owl-carousel">
                    @if (isset($topViewed) && !empty($topViewed))
                        @foreach($topViewed as $book)
                            @include('layout.section.top_book')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area-5 mtb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-img-2">
                    <a href="#"><img src="{{ asset(config('view.image_paths.banner') . '5.jpg') }}" alt="banner" /></a>
                    <div class="banner-text">
                        <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                        <h2>Sale up to 30% off</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bestseller-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="bestseller-content">
                    <h1>{{ trans('settings.home.best_sharing') }}</h1>
                    <h2>{{ $hotUser->name }}</h2>
                    <div class="social-author">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="banner-img-2">
                    @if($bestSharing)
                        <a href="{{ route('books.show', $bestSharing[0]->slug . '-' . $bestSharing[0]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . $bestSharing[0]->medias[0]->path) }}" alt="banner" />
                        </a>
                    @else
                        <a href="{{ route('books.show', $bestSharing[0]->slug . '-' . $bestSharing[0]->id) }}">
                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="banner" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="bestseller-active owl-carousel">
                    @include('layout.section.bestsharing')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="new-book-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                    <h2>{{ trans('settings.home.latest_books') }}</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            @include('layout.section.latest_book')
        </div>
    </div>
</div>
<div class="banner-static-area bg ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="banner-shadow-hover xs-mb">
                    <a href="#"><img src="{{ asset(config('view.image_paths.banner') . '8.jpg') }}" alt="banner" /></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="banner-shadow-hover">
                    <a href="#"><img src="{{ asset(config('view.image_paths.banner') . '9.jpg') }}" alt="banner" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="most-product-area pt-90 pb-100">
    <div class="container">
        <div class="row">
            @if($officeBooks)
                @foreach($officeBooks as $item)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-mb">
                        <div class="section-title-2 mb-30">
                            <h3>{{ $item['office'] }}</h3>
                        </div>
                        <div class="product-active-2 owl-carousel">
                            @include('layout.section.offcie_book')
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="block-newsletter">
                    <h2>Sign up for send newsletter</h2>
                    <p>You can be always up to date with our company new!</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your email address" />
                    </form>
                    <a href="#">Send Email</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="social-group-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="section-title-3">
                    <h3>Latest Tweets</h3>
                </div>
                <div class="twitter-content">
                    <div class="twitter-icon">
                        <a href="#"><i class="fa fa-book" aria-hidden="true"></i></a>
                    </div>
                    <div class="twitter-text">
                        <p>
                            Sách không đơn thuần chỉ là những trang giấy mà trong đó còn chứa đựng một thế giới mà con người luôn khao khát được khám phá.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="section-title-3">
                    <h3>Framgia Apps</h3>
                </div>
                <div class="link-follow">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'wsm_logo.png') }}" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fask_logo.png') }}" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'favicon.png') }}" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fclub_logo.png') }}" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fgas_logo.png') }}" alt=""/>
                            </a>
                        </li>
                        <li class="hidden-sm">
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fsurvey_logo.png') }}" alt=""/>
                            </a>
                        </li>
                        <li class="hidden-sm">
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'logo2.png') }}" alt=""/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.section.modal')
@endsection

@section('footer')
    @parent
@endsection
