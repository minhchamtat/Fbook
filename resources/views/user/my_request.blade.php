@extends('layout.app')

@section('header')
    @parent
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ asset('/') }}">{{ __('settings.default.home') }}</a></li>
                            <li><a href="#" class="active">{{ __('settings.req') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>{{ __('settings.request.myReq') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-end -->
@endsection

@section('content')
<!-- cart-main-area-start -->
<div class="cart-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('layout.notification')
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-thumbnail"><b>{{ __('settings.request.image') }}</b></th>
                                <th class="product-name"><b>{{ __('settings.request.title') }}</b></th>
                                <th class="product-remove"><b>{{ __('settings.request.dayRead') }}</b></th>
                                <th class="product-remove"><b>{{ __('settings.request.user') }}</b></th>
                                <th class="product-name"><b>{{ __('settings.request.date') }}</b></th>
                                <th class="product-price"><b>{{ __('settings.request.status') }}</b></th>
                                <th class="product-remove"><b>{{ __('settings.request.action') }}</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="product-thumbnail">
                                        @if ($book->book->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $book->book->medias[0]->path) }}" alt="man" />
                                        @else
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                                        @endif
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('books.show', $book->book->slug . '-' . $book->book_id) }}">{{ $book->book->title }}</a>
                                    </td>
                                    <td>{{ $book->days_to_read }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td class="type"><label class="stt bg-{{ $book->type }}">{{ $book->type }}</label></td>
                                    @if ($book->type == config('view.request.returned') || $book->type == config('view.request.cancel'))
                                        <td></td>
                                    @elseif ($book->type == config('view.request.reading'))
                                        <td>
                                            {!! Form::open(['method' => 'patch', 'route' => ['my-request.update', $book->id], 'id' => $book->id]) !!}
                                                {!! Form::hidden('status', $book->type) !!}
                                                {!! Form::button(__('settings.request.returned'), ['class' => 'btn btn-return btn-sm notify', 'type' => 'submit']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @else
                                        <td class="product-remove">
                                            {!! Form::open(['method' => 'patch', 'route' => ['my-request.update', $book->id], 'id' => $book->id]) !!}
                                                {!! Form::hidden('status', $book->type) !!}
                                                {!! Form::button(__('settings.request.approve'), ['class' => 'btn btn-info btn-sm approve notify', 'type' => 'submit']) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open(['method' => 'patch', 'route' => ['my-request.update', $book->id], 'id' => $book->id]) !!}
                                                {!! Form::hidden('status', 'dismiss') !!}
                                                {!! Form::button(__('settings.request.dismiss'), ['class' => 'btn btn-dismiss btn-sm notify', 'type' => 'submit']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <div class="page-numbers">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area-end -->
@endsection

@section('footer')
    @parent
@endsection
