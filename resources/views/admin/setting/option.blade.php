@extends('admin.layout.main')

@section('content')
@if (Session::has('success'))
<div class="notify" id="notify-success" data="{{ Session::get('success') }}">
</div>
@elseif (Session::has('unccess'))
<div class="notify" id="notify-unsuccess" data="{{ Session::get('unsuccess') }}">
</div>
@endif
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--full-height m-portlet--fit">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ trans('admin.option.text') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget4 m-widget4--chart-bottom">
                            @if (isset($textBanners) && count($textBanners) > 0)
                            <ul>
                                @foreach ($textBanners as $textBanner)
                                    @include ('admin.setting.text')
                                @endforeach
                                @foreach ($textBanners as $textBanner)
                                    @include ('admin.setting.option_edit')
                                @endforeach
                            </ul>
                            @endif
                            @if (isset($contacts) && count($textBanners) > 0)
                            <ul>
                                @foreach ($contacts as $textBanner)
                                    @include ('admin.setting.text')
                                @endforeach
                                @foreach ($contacts as $textBanner)
                                    @include ('admin.setting.option_edit')
                                @endforeach
                            </ul>
                            @endif
                            @if (isset($emails) && count($textBanners) > 0)
                            <ul>
                                @foreach ($emails as $textBanner)
                                    @include ('admin.setting.text')
                                @endforeach
                                @foreach ($emails as $textBanner)
                                    @include ('admin.setting.option_edit')
                                @endforeach
                            </ul>
                            @endif
                            @if (isset($address) && count($textBanners) > 0)
                            <ul>
                                @foreach ($address as $textBanner)
                                    @include ('admin.setting.text')
                                @endforeach
                                @foreach ($address as $textBanner)
                                    @include ('admin.setting.option_edit')
                                @endforeach
                            </ul>
                            @endif
                            @if (isset($text) && count($text) > 0)
                            <ul>
                                @foreach ($text as $textBanner)
                                    @include ('admin.setting.text')
                                @endforeach
                                @foreach ($text as $textBanner)
                                    @include ('admin.setting.option_edit')
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--full-height m-portlet--fit">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ trans('admin.option.app') }}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span data-toggle="modal" data-target="#myModalApp">{{ trans('admin.option.addApp') }}</span>
                                </span>
                            </a>
                            @include ('admin.setting.add_app')
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        @if (isset($apps) && count($apps) > 0)
                        <div id="ajax-app">
                            @include ('admin.setting.app')
                        </div>
                        @foreach ($apps as $key => $app)
                        @if (isset($textApps[$key]))
                            @include ('admin.setting.edit_app')
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--full-height m-portlet--fit">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{ trans('admin.option.imgHome') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="news">
                            @if (isset($banners) && count($banners) > 0)
                            @foreach ($banners as $key => $banner)
                            <div class="article">
                                {!! Form::open(['method' => 'POST', 'id' => 'uploatImg' . $banner->id, 'files' => true]) !!}
                                {!! Form::hidden('banner', $banner->id) !!}
                                {!! Form::file('img', ['values' => $banner->id, 'class' => 'form-control hidden img-file', 'id' => 'banner' . $banner->id, 'required', 'onchange' => 'changeImg(this)', 'accept' => 'image/png, image/jpeg, image/jpg']) !!}
                                <img values="{{ $banner->id }}" id="img-banners{{ $banner->id }}" class="thumb avatar{{ $key }}" src="{{ asset(config('view.image_paths.slide') . $banner->value) }}">
                                {!! Form::close() !!}
                                <div class="title text-banner">{{ trans('admin.option.banner') }} {{ $key + 1 }}</div>
                            </div>
                            @endforeach
                            @endif
                            @if (isset($bannerBooks))
                            <div class="article">
                                {!! Form::open(['method' => 'POST', 'id' => 'uploatImg' . $bannerBooks->id, 'files' => true]) !!}
                                {!! Form::hidden('banners', $bannerBooks->id) !!}
                                {!! Form::file('img', ['values' => $bannerBooks->id, 'class' => 'form-control hidden img-file', 'id' => 'banner' . $bannerBooks->id, 'required', 'onchange' => 'changeImg(this)', 'accept' => 'image/png, image/jpeg, image/jpg']) !!}
                                <img values="{{ $bannerBooks->id }}" id="img-banners{{ $bannerBooks->id }}" class="thumbs avatar" src="{{ asset(config('view.image_paths.banner') . $bannerBooks->value) }}">
                                {!! Form::close() !!}
                                <div class="title text-banner">{{ trans('admin.option.bookBanner') }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{ Html::script('assets/admin/js/setting.js') }}
{{ Html::script('assets/admin/js/sweetalert2.js') }}
@endsection
