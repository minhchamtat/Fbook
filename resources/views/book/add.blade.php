@extends('layout.app')
@section('header') @parent
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#" class="active">{{ __('page.book.add') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
@endsection

@section('content')
<!-- user-login-area-start -->
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title text-center mb-30">
                    <h2>{{ __('page.book.add') }}</h2>
                </div>
            </div>
            <div class="offset-lg-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                @include('layout.notification')
                <div class="billing-fields">
                    {!! Form::open(['method' => 'post', 'route' => ['books.store'], 'files' => 'true']) !!}
                    <div class="single-register">
                        {!! Form::label('title', __('page.book.title')) !!}
                        {!! Form::text('title', null, ['placeHolder' => 'Title of book ...', 'required' => 'required']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label('author', __('page.book.author')) !!}
                                {!! Form::text('author', null, ['placeHolder' => 'Author of book ...', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label('date', __('page.book.totalPage')) !!}
                                {!! Form::number('total_pages', null, ['placeHolder' => 'Total pages', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="single-register mb-4">
                        <div class="form-group">
                            {!! Form::label('avatar', __('page.book.avatar')) !!}
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse…
                                        {!! Form::file('avatar', ['id' => 'imgInp', 'required' => 'required']) !!}
                                    </span>
                                </span>
                                {!! Form::text(null, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <img id='img-upload'/>
                        </div>
                    </div>
                    <div class="single-register">
                        {!! Form::label('category', __('page.book.category')) !!}
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-4 mb-1">
                                    <div class="m-checkbox-list">
                                        <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                            {!! Form::checkbox('category[]', $category->id, $loop->first ? 'checked' : '') !!}
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label('sku', __('page.book.sku')) !!}
                                {!! Form::text('sku', null, ['placeHolder' => 'Sku of book ...', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                {!! Form::label('publish_date', __('page.book.publish')) !!}
                                {!! Form::date('publish_date', null, ['id' => 'example-datetime-local-input', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="single-register">
                        {!! Form::label('description', __('page.book.description')) !!}
                        {!! Form::textarea('description', null, ['id' => 'mytextarea']) !!}
                    </div>
                    <div class="single-register">
                        {!! Form::submit(__('page.submit'), ['class' => 'btn btn-info']) !!}
                        {!! Form::reset(__('page.cancel'), ['class' => 'btn btn-secondary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- user-login-area-end -->
@endsection

@section('footer') @parent
@endsection

@section('script')
    {!! Html::script('assets/tinymce/js/tinymce//tinymce.min.js') !!}
    {!! Html::script('assets/js/upload.js') !!}
    <script>
        jQuery(document).ready(function() {
            tinymce.init({
                selector: 'textarea#mytextarea'
            });
        });
    </script>
@endsection
