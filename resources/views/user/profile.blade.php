@extends('layout.app')

@section('header')
    @parent
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="{{ asset(config('view.image_paths.banner') . '32.jpg') }}" alt="banner"/>
                <img align="left" class="fb-image-profile thumbnail" src="{{ $user->avatar }}"/>
                <div class="fb-profile-text floatleft">
                    @if ($user)
                        <h1>{{ $user->name }}</h1>
                    @endif
                    @if (in_array($user->id, $followingIds))
                        <button data-id="{{ $user->id }}" class="btn btn-follow following floatleft">{{ trans('settings.profile.following') }}</button>
                    @elseif (Auth::id() == $user->id)
                    @else
                        <button data-id="{{ $user->id }}" class="btn btn-follow follow floatleft">{{ trans('settings.profile.follow') }}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>{{ trans('settings.profile.introduction') }}</h2>
                    </div>
                    <div class="left-title">
                        @auth
                            @if ($user)
                                <ul  class="intro-list">
                                    <li title="Reputations">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span>{{ $user->reputation_point }}</span>
                                    </li>
                                    <li title="Email">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                    <li title="Phone">
                                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                                        <span>{{ $user->phone }}</span></li>
                                    <li title="Employee Code">
                                        <i class="fa fa-barcode" aria-hidden="true"></i>
                                        <span>{{ $user->employee_code }}</span></li>
                                    <li title="Position">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <span>{{ $user->position }}</span>
                                    </li>
                                    <li title="Worksapce">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>{{ $user->workspace}}</span>
                                    </li>
                                    <li title="Following Users">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <span>{{ count($followings->collapse()) }}</span>
                                    </li>
                                    <li title="Followers">
                                        <i class="fa fa-share-square" aria-hidden="true"></i>
                                        <span>{{ count($followers->collapse()) }}</span>
                                    </li>
                                </ul>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="mb-30">
                    <ul class="nav nav-tabs status-tabs" role="tablist">
                        <li class="active"><a href="#sharing" data-toggle="tab">{{ trans('settings.profile.sharing') }}</a></li>
                        <li><a href="#waiting" data-toggle="tab">{{ trans('settings.profile.waiting') }}</a></li>
                        <li><a href="#reading" data-toggle="tab">{{ trans('settings.profile.reading') }}</a></li>
                        <li><a href="#returned" data-toggle="tab">{{ trans('settings.profile.returned') }}</a></li>
                        <li><a href="#following" data-toggle="tab">{{ trans('settings.profile.following') }}</a></li>
                        <li><a href="#followers" data-toggle="tab">{{ trans('settings.profile.followers') }}</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="sharing" value="false">
                        @include ('layout.section.profile_books')
                    </div>
                    <div class="tab-pane" id="waiting" value="true"></div>
                    <div class="tab-pane" id="reading" value="true"></div>
                    <div class="tab-pane" id="returned" value="true"></div>
                    <div class="tab-pane" id="following" value="false">
                        @if (count($followings))
                            @for ($i = 0; $i < count($followings); $i++)
                                <div class="book-status following" id="following{{ $i }}">
                                    <div class="row">
                                        @foreach ($followings[$i] as $u)
                                            <div class="col-sm-6 col-md-4">
                                                <div class="d-flex exhibition-item user">
                                                    <a href="{{ route('user', $u->id) }}" class="a-follow">
                                                        <img src="{{ $u->avatar }}" class="avatar-icon">
                                                    </a>
                                                    <div class="user-info overflow-hidden">
                                                        <a href="{{ route('user', $u->id) }}" class="link"><b>{{ $u->name }}</b></a>
                                                        <div class="subscribe">
                                                            @if (in_array($u->id, $followingIds))
                                                                <button data-id="{{ $u->id }}" class="btn btn-follow following">{{ trans('settings.profile.following') }}</button>
                                                            @elseif (Auth::id() == $u->id)
                                                            @else
                                                                <button data-id="{{ $u->id }}" class="btn btn-follow  follow">{{ trans('settings.profile.follow') }}</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endfor
                            <div class="pagination-area mt-50">
                                <div class="page-number">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#">«</a></li>
                                        @for ($i = 0; $i < count($followings); $i++)
                                            <li class="status-page"><a data-target="following" href="#following{{ $i }}">{{ $i + 1 }}</a></li>
                                        @endfor
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="followers" value="false">
                        @if (count($followers))
                            @for ($i = 0; $i < count($followers); $i++)
                                <div class="book-status follower" id="follower{{ $i }}">
                                    <div class="row">
                                        @foreach ($followers[$i] as $u)
                                            <div class="col-sm-6 col-md-4">
                                                <div class="d-flex exhibition-item user">
                                                    <a href="{{ route('user', $u->id) }}" class="a-follow">
                                                        <img src="{{ $u->avatar }}" class="avatar-icon">
                                                    </a>
                                                    <div class="user-info overflow-hidden">
                                                        <a href="{{ route('user', $u->id) }}" class="link"><b>{{ $u->name }}</b></a>
                                                        <div class="subscribe">
                                                            @if (in_array($u->id, $followingIds))
                                                                <button data-id="{{ $u->id }}" class="btn btn-follow following">{{ trans('settings.profile.following') }}</button>
                                                            @elseif (Auth::id() == $u->id)
                                                            @else
                                                                <button data-id="{{ $u->id }}" class="btn btn-follow  follow">{{ trans('settings.profile.follow') }}</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endfor
                            <div class="pagination-area mt-50">
                                <div class="page-number">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#">«</a></li>
                                        @for ($i = 0; $i < count($followers); $i++)
                                            <li class="status-page"><a data-target="follower" href="#follower{{ $i }}">{{ $i + 1 }}</a></li>
                                        @endfor
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
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
