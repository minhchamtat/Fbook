@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.book.edit') }}</h3>
                    <a target="_blank" href="{{ route('books.show', $book->slug . '-' . $book->id) }}" class="btn btn-info">{{ __('admin.showBook') }}</a>
                </div>
            </div>
        </div>

        <div class="m-content">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layout.notification')
                        <div class="m-portlet m-portlet--tab">
                            {!! Form::open(['method' => 'PUT', 'route' => ['book.update', $book->id], 'files' => 'true', 'class' => 'm-form m-form--fit m-form--label-align-right']) !!}
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('title', __('admin.book.title'), ['class' => 'col-2 required']) !!}
                                        <div class="col-10">
                                            {!! Form::text('title', $book->title, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.title')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('description', __('admin.description'), ['class' => 'col-2 required']) !!}
                                        <div class="col-10">
                                            {!! Form::textarea('description', $book->description, ['id' => 'mytextarea']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('avatar', __('admin.book.avatar'), ['class' => 'col-2 mb-0']) !!}
                                        <div class="col-10 custom-file" id="custom">
                                            {!!
                                                Form::file('avatar', [
                                                    'class' => 'custom-file-input',
                                                    'id' => 'customFile',
                                                    'accept' => 'image/png, image/jpg, image/jpeg, image/bmp, image/gif',
                                                    'onchange' => 'changeFile(event)',
                                                    'onclick' => 'clickFile(event)'
                                                ])
                                            !!}
                                            {!! Form::label('customFile', __('admin.book.placeHolder.chooseFile'), ['class' => 'custom-file-label col-10 ml-3', 'id' => 'label']) !!}
                                            @if ($book->medias[0]->count() > 0)
                                                {!! Form::hidden('avatar_old', $book->medias[0]->id) !!}
                                            @else
                                                {!! Form::hidden('avatar_old') !!}
                                            @endif
                                        </div>
                                        <div class="col-4 offset-3 mt-3">
                                            @if ($book->medias[0]->count() > 0)
                                                <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="img-book" class="img-book">
                                            @else
                                                <img src="" alt="" class="img-book">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('author', __('admin.book.author'), ['class' => 'col-2 required']) !!}
                                        <div class="col-10">
                                            {!! Form::text('author', $book->author, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.author')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', __('admin.book.publishDate'), ['class' => 'col-2 required']) !!}
                                        <div class="col-10">
                                            {!! Form::date(
                                                'publish_date',
                                                $book->publish_date,
                                                [
                                                    'class' => 'form-control m-input',
                                                    'id' => 'example-datetime-local-input',
                                                    'max' => date('Y/m/d'),
                                                ]
                                            ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', __('admin.book.totalPage'), ['class' => 'col-2 required']) !!}
                                        <div class="col-10">
                                            {!! Form::number('total_pages', $book->total_pages, ['class' => 'form-control m-input', 'placeHolder' => __('admin.book.placeHolder.totalPage')]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('category', __('admin.book.cate'), ['class' => 'col-2 required']) !!}
                                        <div class="col-9">
                                            <div class="row">
                                                @foreach ($categories as $cat)
                                                    <div class="col-4 mb-3">
                                                        <div class="m-checkbox-list">
                                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                                <input type="checkbox" value="{{ $cat->id }}" name="category[]"
                                                                    @foreach ($book->categories as $bc)
                                                                        @if ($bc->id === $cat->id)
                                                                            {{ 'checked' }}
                                                                        @endif
                                                                    @endforeach
                                                                >
                                                                {{ $cat->name }}
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-12">
                                                {!! Form::submit(__('admin.submit'), ['class' => 'btn btn-success']) !!}
                                                {!! Form::reset(__('admin.reset'), ['class' => 'btn btn-secondary']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('script')
    {{ Html::script('admin_asset/assets/tinymce/js/tinymce/tinymce.min.js') }}
    {{ Html::script('assets/admin/js/uploadFile.js') }}

    <script>
        jQuery(document).ready(function() {
            tinymce.init({
                selector: 'textarea#mytextarea'
            });
        });
    </script>
@endsection
