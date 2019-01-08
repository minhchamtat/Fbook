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
                            <p>{{ $totalUser }} {{__('settings.default.members') }}</p>
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
<div class="product-area pt-60 xs-mb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-25">
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
            @if (isset($topInteresting) && !empty($topInteresting))
                @foreach($topInteresting as $book)
                    @include('layout.section.modal')
                @endforeach
            @endif
            <div class="tab-pane fade" id="books">
                <div class="tab-active owl-carousel">
                    @if (isset($topReview) && !empty($topReview))
                        @foreach($topReview as $book)
                            @include('layout.section.top_book')
                        @endforeach
                    @endif
                </div>
            </div>
            @if (isset($topReview) && !empty($topReview))
                @foreach($topReview as $book)
                    @include('layout.section.modal')
                @endforeach
            @endif
            <div class="tab-pane fade" id="bussiness">
                <div class="tab-active owl-carousel">
                    @if (isset($topViewed) && !empty($topViewed))
                        @foreach($topViewed as $book)
                            @include('layout.section.top_book')
                        @endforeach
                    @endif
                </div>
            </div>
            @if (isset($topViewed) && !empty($topViewed))
                @foreach($topViewed as $book)
                    @include('layout.section.modal')
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="banner-area-5 mtb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-img-2">
                    <a href="{{ asset(config('view.links.banner')) }}"><img src="{{ asset(config('view.image_paths.banner') . 'state-of-chance.png') }}" alt="banner" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bestseller-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-25">
                    <h2>{{ trans('settings.home.top_author') }}</h2>
                </div>
            </div>
            <div class="tab-active tab-author owl-carousel">
                @if (isset($bestSharings) && !empty($bestSharings))
                    @foreach($bestSharings as $bestSharing)
                        @include('layout.section.bestsharing')
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div class="new-book-area pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-60 mb-30 section-title-res">
                    <h2>{{ trans('settings.home.latest_books') }}</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            @include('layout.section.latest_book')
        </div>

        @foreach ($latestBook as $book)
            @include ('layout.section.modal')
        @endforeach
    </div>
</div>
<div class="banner-static-area bg ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-shadow-hover xs-mb">
                    <img src="{{ asset(config('view.image_paths.banner') . 'banner-sach.png') }}" alt="banner" width="100%" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="most-product-area pt-90 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="product-active-2 owl-carousel">
                    @if($officeBooks)
                        @foreach($officeBooks as $item)
                            <div class="section-title-2 mb-30">
                                <h3 class="mb-30">{{ $item['office'] }}</h3>
                                @include('layout.section.offcie_book')
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="block-newsletter">
                    <h2>{{ __('page.email.signUp') }}</h2>
                    <p>{{ __('page.email.content') }}</p>
                    <form action="#">
                        <input type="text" placeholder="{{ __('page.email.placeHolder') }}" />
                    </form>
                    <a href="#">{{ __('page.email.submit') }}</a>
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
                    <h3><a href="{{ asset(config('view.links.club')) }}" target="_blank">{{ __('page.club') }}</a></h3>
                </div>
                <div class="twitter-content">
                    <div class="twitter-icon">
                        <a><i class="fa fa-book" aria-hidden="true"></i></a>
                    </div>
                    <div class="twitter-text">
                        <p>{{ __('page.twitter') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="section-title-3">
                    <h3>{{ __('page.app') }}</h3>
                </div>
                <div class="link-follow">
                    <ul>
                        <li>
                            <a href="{{ asset(config('view.links.wsm')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'wsm_logo.png') }}" data-toggle="tolltip" title="WSM" alt="WSM"/>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset(config('view.links.fask')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fask_logo.png') }}" data-toggle="tolltip" title="FAsk" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset(config('view.links.fitm')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fitm.png') }}" data-toggle="tolltip" title="FITM" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset(config('view.links.fclub')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fclub_logo.png') }}" data-toggle="tolltip" title="FClub" alt=""/>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset(config('view.links.fgas')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fgas_logo.png') }}" data-toggle="tolltip" title="FGas" alt=""/>
                            </a>
                        </li>
                        <li class="hidden-sm">
                            <a href="{{ asset(config('view.links.fsurvey')) }}" target="_blank">
                                <img src="{{ asset(config('view.image_paths.logo') . 'fsurvey_logo.png') }}" data-toggle="tolltip" title="FSurvey" alt=""/>
                            </a>
                        </li>
                        <li class="hidden-sm">
                            <a href="#">
                                <img src="{{ asset(config('view.image_paths.logo') . 'logo4.png') }}" data-toggle="tolltip" title="FBook" alt=""/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
