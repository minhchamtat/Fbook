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
                            <li><a class="active"><a href="#title" data-toggle="tab">{{ trans('page.summary') }}</a></li>
                            <li><a class="active"><a href="#author" data-toggle="tab">{{ trans('page.book.author') }}</a></li>
                            <li><a class="active"><a href="#description" data-toggle="tab">{{ trans('page.book.description') }}</a></li>
                            <li><a class="active"><a href="#users" data-toggle="tab">{{ trans('settings.admin.layout.users') }}</a></li>
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
    <div class="cart-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="suggestion">
                    <div class="tab-content">
                        <div class="tab-pane active" id="title">
                            <ul class="suggestions-list">
                                @if (count($titles) > 0)
                                    @foreach ($titles as $book)
                                        <li class="result-entry" data-suggestion="Target 1" data-position="1"data-type="type" data-analytics-type="merchant">
                                            <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" class="result-link">
                                                <div class="media">
                                                    <div class="media-left">
                                                        @if ($book->medias->count() > 0)
                                                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="item" class="media-object"/>
                                                        @else
                                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="media-object"/>
                                                        @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $book->title }}</h4>
                                                        <p>{{ $book->author }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    {{ trans('settings.home.not_found') }}
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="author">
                            <ul class="suggestions-list">
                                @if (count($authors) > 0)
                                    @foreach ($authors as $author)
                                        <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                                            <a href="{{ route('books.show', $author->slug . '-' . $author->id) }}" class="result-link">
                                                <div class="media">
                                                    <div class="media-left">
                                                        @if ($author->medias->count() > 0)
                                                            <img src="{{ asset(config('view.image_paths.book') . $author->medias[0]->path) }}" alt="item" class="media-object"/>
                                                        @else
                                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="media-object"/>
                                                        @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $author->title }}</h4>
                                                        <p>{{ $author->author }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    {{ trans('settings.home.not_found') }}
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="description">
                            <ul class="suggestions-list">
                                @if (count($descriptions) > 0)
                                    @foreach ($descriptions as $description)
                                        <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                                            <a href="{{ route('books.show', $description->slug . '-' . $description->id) }}" class="result-link">
                                                <div class="media">
                                                    <div class="media-left">
                                                        @if ($description->medias->count() > 0)
                                                            <img src="{{ asset(config('view.image_paths.book') . $description->medias[0]->path) }}" alt="item" class="media-object"/>
                                                        @else
                                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt=" woman" class="media-object"/>
                                                        @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $description->title }}</h4>
                                                        <p>{{ $description->author }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    {{ trans('settings.home.not_found') }}
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="users">
                            <div class="suggestion">
                                <ul class="suggestions-list">
                                    @if (count($users) > 0)
                                        @foreach ($users as $user)
                                            <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                                                <a href="{{ route('user', $user->id) }}" class="result-link">
                                                    <div class="media">
                                                        <div>
                                                            @if ($user->avatar)
                                                                <img src="{{ $user->avatar }}" alt="item" class="media-object mg-thumbnail avatar-icon"/>
                                                            @else
                                                                <img src="{{ asset(config('view.image_paths.user') . 'default.jpg') }}" alt="woman" class="media-object mg-thumbnail avatar-icon"/>
                                                            @endif
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ $user->name }}</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        {{ trans('settings.home.not_found') }}
                                    @endif
                                </ul>
                            </div>
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
