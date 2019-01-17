@extends('layout.app')

@section('header')
    @parent
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">{{ trans('settings.default.home') }}</a></li>
                            <li><a class="active">{{ trans('settings.header.search') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li>{{ trans('page.searchBy') }}</li>
                            <li class="active"><a id="status" href="#title" data-toggle="tab">{{ trans('page.summary') }}</a></li>
                            <li><a id="status" href="#author" data-toggle="tab">{{ trans('page.book.author') }}</a></li>
                            <li><a id="status" href="#description" data-toggle="tab">{{ trans('page.book.description') }}</a></li>
                            <li><a id="status" href="#users" data-toggle="tab">{{ trans('settings.admin.layout.users') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>{{ trans('page.keySearch') }} {{ $key }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('layout.section.search_page')
@endsection

@section('footer')
    @parent
@endsection
