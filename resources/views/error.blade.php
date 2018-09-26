@extends('layout.app')

@section('header')
    @parent
@endsection

@section('content')
<div class="section-element-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header text-center mb-20">
                    <img src="{{ asset(config('view.image_paths.img') . '3.jpg') }}" alt="not-found-img" />
                    <p>{{ trans('settings.error.404') }}</p>
                </div>
                <div class="entry-content text-center mb-30">
                    <p>{{ trans('settings.error.sorry') }}</p>
                    <a href="{{ route('home') }}">{{ trans('settings.error.go_to_home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
